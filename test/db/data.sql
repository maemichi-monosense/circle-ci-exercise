DROP TABLE IF EXISTS atomic_counter;
CREATE TABLE atomic_counter (
    id SERIAL PRIMARY KEY
  , count INT UNSIGNED NOT NULL DEFAULT 0
);

INSERT INTO test.atomic_counter(count) VALUES (3);
