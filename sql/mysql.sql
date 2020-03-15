CREATE TABLE urlrewrite_url (
  id         INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  pattern    VARCHAR(255)     NOT NULL DEFAULT '',
  target_url VARCHAR(255)     NOT NULL DEFAULT '',
  enabled    INT(1)           NOT NULL DEFAULT 0,
  PRIMARY KEY (id)
)
  ENGINE = MyISAM;
