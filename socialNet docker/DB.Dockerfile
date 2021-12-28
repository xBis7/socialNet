FROM postgres:latest

ENV POSTGRES_DB socialNet
ENV POSTGRES_USER postgres
ENV POSTGRES_PASSWORD postgres

ADD ./dbScript.sql /docker-entrypoint-initdb.d/dbScript.sql