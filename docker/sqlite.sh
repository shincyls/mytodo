#!/usr/bin/env sh

sqlite3 -batch "$PWD/database/mytodo.sqlite" <"$PWD/docker/initdb.sql"