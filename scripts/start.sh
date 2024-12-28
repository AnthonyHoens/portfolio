#! /bin/bash

scriptDir=$(dirname -- "$(readlink -f -- "$BASH_SOURCE")")
parentDir="$(dirname "$scriptDir")"

file="$parentDir/docker-compose.yml"
fileOverride="$parentDir/docker-compose.override.yml"

source $scriptDir/environment.sh

if [ -f $fileOverride ]; then
  docker compose -f $file -f $fileOverride up -d
else
  docker compose -f $file up -d
fi

echo "Site is started"
