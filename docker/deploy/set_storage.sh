#!/bin/sh

docker volume create ${APP_NAME}-laravel_storage

# Get the mount point of the Docker volume
MOUNTPOINT=$(docker volume inspect ${APP_NAME}-laravel_storage --format='{{.Mountpoint}}')

# Check if the directory in the volume is empty
if [ -z "$(ls -A "$MOUNTPOINT")" ]; then
    # If empty, copy files into it
    cp -r ../../storage/. "$MOUNTPOINT"
    echo "Files copied to ${APP_NAME}-laravel_storage volume."
else
    echo "Directory in ${APP_NAME}-laravel_storage volume is not empty."
fi