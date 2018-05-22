CREATE TABLE microposts.microposts (
    message_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    user_id BIGINT UNSIGNED NOT NULL,
    message VARCHAR(280) NOT NULL,
    posted_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);