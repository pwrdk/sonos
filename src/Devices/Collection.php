<?php

namespace duncan3dc\Sonos\Devices;

use duncan3dc\Log\LoggerAwareTrait;
use duncan3dc\Sonos\Devices\Device;
use duncan3dc\Sonos\Interfaces\DeviceCollectionInterface;

class Collection implements DeviceCollectionInterface
{
    use LoggerAwareTrait;

    /**
     * @var Device[] $devices The devices that are in this collection.
     */
    private $devices = [];


    /**
     * Create a new instance.
     *
     * @param Factory $factory The factory to create new devices from
     */
    public function __construct(Factory $factory)
    {
        $this->factory = $factory;
    }


    /**
     * Add a device to this collection.
     *
     * @param Device $device The device to add
     *
     * @return $this
     */
    public function addDevice(Device $device): DeviceCollectionInterface
    {
        # Replace any existing device with the same IP address
        foreach ($this->devices as &$val) {
            if ($val->getIp() === $device->getIp()) {
                $val = $device;
                return $this;
            }
        }

        $this->devices[] = $device;

        return $this;
    }


    /**
     * Add a device to this collection using its IP address
     *
     * @param string $address The IP address of the device to add
     *
     * @return $this
     */
    public function addIp(string $address): DeviceCollectionInterface
    {
        $device = $this->factory->create($address);

        return $this->addDevice($device);
    }


    /**
     * Get all of the devices in this collection.
     *
     * @return Device[]
     */
    public function getDevices(): array
    {
        return $this->devices;
    }


    /**
     * Remove all devices from this collection.
     *
     * @return $this
     */
    public function clear(): DeviceCollectionInterface
    {
        $this->devices = [];
        $this->speakers = [];

        return $this;
    }
}
