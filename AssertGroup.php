<?php

namespace ExtendsSClass\Assertion;

class AssertGroup implements AssertGroupInterface
{

    private bool $comparison;

    public function __construct(bool $comparison)
    {
        $this->comparison = $comparison;
    }

    public function andX(
        bool $comparison1,
        bool $comparison2 = null,
        bool $comparison3 = null,
        bool $comparison4 = null,
        bool $comparison5 = null
    ): AssertGroupInterface
    {
        $reflection = new \ReflectionClass($this);
        foreach($reflection->getMethod('andX')->getParameters() as $comparison) {
            $comparison = ${$comparison->name};
            if($comparison === null) {
                continue;
            }

            $this->comparison = $this->comparison && $comparison;
        }

        return $this;
    }

    public function orX(
        bool $comparison1,
        bool $comparison2 = null,
        bool $comparison3 = null,
        bool $comparison4 = null,
        bool $comparison5 = null
    ): AssertGroupInterface
    {
        $reflection = new \ReflectionClass($this);
        foreach($reflection->getMethod('orX')->getParameters() as $comparison) {
            $comparison = ${$comparison->name};
            if($comparison === null) {
                continue;
            }

            $this->comparison =  $this->comparison || $comparison;
        }

        return $this;
    }

    public function getResult() :bool
    {
        return $this->comparison;
    }
}