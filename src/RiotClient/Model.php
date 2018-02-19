<?php

namespace RiotClient;

abstract class Model
{
    /**
     * The list of bindings.
     * @var array.
     */
    protected $bindings;

    /**
     * Converts an array of data into an object of the called model's class.
     *
     * @param array $data The data array.
     *
     * @return self An instance of the Model class.
     */
    public function parse($data)
    {
        // Map the object and underlying objects to arrays and return the model
        $this->mapToObject($this, $data);
        return $this;
    }

    /**
     * Recursively maps an array of data to an object.
     *
     * @param mixed $object The object to map the data to.
     * @param array $data The data array to map.
     *
     * @return mixed The modified object.
     */
    private function mapToObject($object, $data)
    {
        // Check if the root of the data is a collection
        if (!empty(array_values($data)[0]) && is_array(array_values($data)[0]) && isset($object->bindings['_collection'])) {
            return $this->mapCollection($object, '', $data);
        }

        // Loop through the data
        foreach ($data as $key => $value) {
            // Check if the value is a collection
            if (is_array($value) && !empty(array_values($value)[0]) && is_array(array_values($value)[0]) && isset($object->bindings[$key . '_collection'])) {
                $this->mapCollection($object, $key, $value);
                continue;
            }

            // Check if the property isn't bound
            if (!isset($object->bindings[$key])) {
                // Set the data
                $object->{$key} = $value;
                continue;
            }

            // Set the property
            $property = $object->bindings[$key];

            // Check if the property is an array
            if (is_array($property)) {
                $value = (new $property[0]())->parse($value);
                $property = !empty($property[1]) ? $property[1] : $key;
            }

            // Set the data
            $object->{$property} = $value;
        }

        // Return the modified object
        return $object;
    }

    /**
     * Maps a collection to an object.
     *
     * @param mixed $object The object to bind the collection to.
     * @param string $key The collection's key in the data.
     * @param array $data The collection data to parse.
     *
     * @return mixed The modified object.
     */
    private function mapCollection($object, $key, $data)
    {
        // Set the property name, defaults to collection
        $property = !empty($object->bindings[$key . '_collection'][1]) ? $object->bindings[$key . '_collection'][1] : 'collection';

        // Set the property to an empty array
        $object->{$property} = [];

        // Set the class for a single object in the collection
        $singleClass = $object->bindings[$key . '_collection'][0];

        // Loop through the data, created the objects and add them to the collection
        foreach ($data as $row) {
            $object->{$property}[] = (new $singleClass())->parse($row);
        }

        // Return the object
        return $object;
    }
}
