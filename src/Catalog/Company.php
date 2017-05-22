<?php
/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     Proprietary
 */

namespace Wizaplace\Catalog;

class Company
{
    /** @var integer */
    private $id;

    /** @var string */
    private $name;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
