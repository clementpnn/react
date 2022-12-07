CREATE TABLE IF NOT EXISTS User
(
  id        INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
  username  VARCHAR(255) NOT NULL,
  password  VARCHAR(255) NOT NULL,
  email     VARCHAR(255) NOT NULL,
  admin     INT          NOT NULL
);

CREATE TABLE IF NOT EXISTS Post
(
  id      INT          NOT NULL PRIMARY KEY AUTO_INCREMENT,
  content TEXT         NOT NULL,
  author  INT          NOT NULL,
  title   VARCHAR(255) NOT NULL,
  date    DATETIME     NOT NULL,
  image   VARCHAR(255) NOT NULL,

  FOREIGN KEY (author) REFERENCES User (id)
);