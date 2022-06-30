#! /usr/bin/env bash

function start()
{
    echo "Starting browser..."
    nice firefox --private-window http://www.api.students.com
}

start