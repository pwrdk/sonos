<?php

namespace duncan3dc\Sonos\Interfaces;

use duncan3dc\Sonos\Devices\Device;
use Psr\Log\LoggerAwareInterface;

/**
 * Manage a group of devices.
 */
interface DeviceCollectionInterface extends LoggerAwareInterface
{

    /**
     * Add a device to this collection.
     *
     * @param Device $device The device to add
     *
     * @return $this
     */
    public function addDevice(Device $device): DeviceCollectionInterface;


    /**
     * Get all of the devices in this collection.
     *
     * @return Device[]
     */
    public function getDevices(): array;


    /**
     * Remove all devices from this collection.
     *
     * @return $this
     */
    public function clear(): DeviceCollectionInterface;
}
