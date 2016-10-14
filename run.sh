#! /usr/bin/env bash
docker run --rm -v $(pwd):/app -v $(pwd)/docker/etc/hosts:/etc/hosts -w /app php:5.6-cli ./vendor/bin/codecept run 