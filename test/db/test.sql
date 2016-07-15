CREATE TABLE circle_test.AtomicCounter (
    id SERIAL PRIMARY KEY
  , count UNSIGNED INT DEFAULT 0
  , index(id)
);

INSERT INTO circle_test.AtomicCounter(count) VALUES (3);
