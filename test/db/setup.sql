CREATE DATABASE test;

CREATE TABLE test.atomic_counter (
    id SERIAL PRIMARY KEY
  , count INT UNSIGNED DEFAULT 0
);
