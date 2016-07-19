CREATE TABLE test.atomic_counter (
    id SERIAL PRIMARY KEY
  , count INT UNSIGNED DEFAULT 0
);

INSERT INTO test.atomic_counter(count) VALUES (3);
