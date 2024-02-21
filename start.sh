#! /usr/bin/env bash

function index()
{
    echo "Starting browser..."

    nice firefox --private-window http://www.api.students.com
}

index