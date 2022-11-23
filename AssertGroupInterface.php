<?php

namespace ExtendsSClass\Assertion;

interface AssertGroupInterface
{
    public function andX(        bool $comparison1,
                                 bool $comparison2 = null,
                                 bool $comparison3 = null,
                                 bool $comparison4 = null,
                                 bool $comparison5 = null):AssertGroupInterface;

    public function orX(        bool $comparison1,
                                bool $comparison2 = null,
                                bool $comparison3 = null,
                                bool $comparison4 = null,
                                bool $comparison5 = null):AssertGroupInterface;

    public function getResult() :bool;
}