<?php

class House
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $rooms = [];

    public function __construct(string $name)
    {
        $this->setName($name);
    }

    public function addRoom(Room $room)
    {
        $this->rooms[] = $room;
    }

    public function getWindowCount()
    {
        $count = 0;
        foreach ($this->rooms as $r) {
            $count += $r->getWindowCount();
        }

        return $count;
    }

    /**
     * Get the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     *
     * @return self
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of rooms.
     *
     * @return array
     */
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set the value of rooms.
     *
     * @param array $rooms
     *
     * @return self
     */
    public function setRooms(array $rooms)
    {
        $this->rooms = $rooms;

        return $this;
    }
}
