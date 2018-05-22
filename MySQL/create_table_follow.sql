CREATE TABLE microposts.follow (
    follow_relation_id BIGINT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
    following_user_id BIGINT UNSIGNED NOT NULL,
    followed_user_id BIGINT UNSIGNED NOT NULL
);