#!/usr/bin/env bash

docker build -t nikitakiselev/photogallery:1.0 -f ./deployment/images/circleci.docker . && \
docker push nikitakiselev/photogallery
