FROM quay.io/keboola/docker-base-php56:0.0.2
MAINTAINER Ondrej Popelka <ondrej.popelka@keboola.com>

COPY . /home/
ENTRYPOINT php /home/main.php
