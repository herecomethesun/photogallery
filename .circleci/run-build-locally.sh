#!/usr/bin/env bash

curl --user ${CIRCLE_TOKEN}: \
    --request POST \
    --form config=.circleci/@config.yml \
    --form notify=false \
        https://circleci.com/api/v2/project/github/nikitakiselev/photogallery/tree/develop
