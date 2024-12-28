#! /bin/bash

scriptDir=$(dirname -- "$(readlink -f -- "$BASH_SOURCE")")
parentDir="$(dirname "$scriptDir")"

source $scriptDir/environment.sh

docker compose -f "$parentDir/docker-compose.yml" down $@
