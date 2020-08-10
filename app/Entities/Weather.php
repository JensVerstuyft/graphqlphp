<?php

namespace App\Entities;

use TheCodingMachine\GraphQLite\Annotations\Field;
use TheCodingMachine\GraphQLite\Annotations\Type;

/**
 * @Type()
 */
class Weather
{

    private $id;
    private $main;
    private $description;
    private $icon;

    public function __construct() {

    }

    public function JsonToWeather($json) {
        foreach ($json as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * @Field()
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @Field()
     */
    public function getMain(): ?string
    {
        return $this->main;
    }

    /**
     * @Field()
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @Field()
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }

}