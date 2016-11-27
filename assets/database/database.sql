CREATE TABLE sqlite_sequence(name,seq);
CREATE TABLE "relation" (
    `id`    INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `parent`    INTEGER NOT NULL,
    `child`    INTEGER NOT NULL REFERENCES item(id) ON DELETE CASCADE,
    `type`    TEXT DEFAULT 'undefined'
);
CREATE TABLE "type"(
    "name" TEXT PRIMARY KEY,
    "deep" INTEGER UNIQUE NOT NULL
);
;
;
CREATE TABLE "item" (
    `id`    INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `deep`    INTEGER NOT NULL DEFAULT 0,
    `link`    TEXT UNIQUE,
    `title`    TEXT NOT NULL,
    `content`    TEXT,
    `created`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated`    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `keyword`    TEXT,
    `description`    TEXT,
    `tags`    INTEGER
);
;
CREATE UNIQUE INDEX unique_name on "item"(link);


--NEW bata schame

CREATE TABLE "path"(
    `id`        INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `path`      TEXT,
    `name`      TEXT,
    `active`    INTEGER DEFAULT '1'
);

CREATE TABLE "item" (
    `id`             INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `link`           TEXT UNIQUE,
    `title`          TEXT NOT NULL,
    `content`        TEXT,
    `created`        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated`        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `keyword`        TEXT,
    `description`    TEXT,
    `tags`           TEXT
);
CREATE UNIQUE INDEX unique_name on "item"(link);

CREATE TABLE "relation" (
    `id`      INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `path`    INTEGER NOT NULL,
    `item`    INTEGER NOT NULL REFERENCES item(id) ON DELETE CASCADE
);

INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (1, 'link1','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (2, 'link2','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (3, 'link3','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (4, 'link4','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (5, 'link5','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (6, 'link6','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (7, 'link7','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (8, 'link8','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (9, 'link9','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (10, 'link10','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (11, 'link11','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (12, 'link12','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (13, 'link13','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (14, 'link14','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (15, 'link15','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (16, 'link16','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (17, 'link17','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (18, 'link18','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (19, 'link19','title','content');
INSERT INTO `item` (`id`, `link`,`title`,`content`) VALUES (20, 'link20','title','content');

INSERT INTO `path` (`id`, `path`,`name`) VALUES (1, '/php', 'PHP');
INSERT INTO `path` (`id`, `path`,`name`) VALUES (2, '/php/function', 'Default functions');
INSERT INTO `path` (`id`, `path`,`name`) VALUES (3, '/php/web-resourses', 'Web Resourses');
INSERT INTO `path` (`id`, `path`,`name`) VALUES (4,'/javascript', 'JavaScript');
INSERT INTO `path` (`id`, `path`,`name`) VALUES (5, '/javascript/function', 'Default functions');
INSERT INTO `path` (`id`, `path`,`name`) VALUES (6, '/javascript/web-resourses', 'Web Resourses');
INSERT INTO `path` (`id`, `path`,`name`) VALUES (7, '/python', 'Python');
INSERT INTO `path` (`id`, `path`,`name`) VALUES (8, '/python/function', 'Default functions');
INSERT INTO `path` (`id`, `path`,`name`) VALUES (9, '/python/web-resourses', 'Web Resourses');

INSERT INTO `relation` (`path`,`item`) VALUES ();

INSERT INTO `relation` (`path`,`item`) VALUES (2, 1);
INSERT INTO `relation` (`path`,`item`) VALUES (2, 2);
INSERT INTO `relation` (`path`,`item`) VALUES (3, 3);
INSERT INTO `relation` (`path`,`item`) VALUES (3, 4);
INSERT INTO `relation` (`path`,`item`) VALUES (5, 5);
INSERT INTO `relation` (`path`,`item`) VALUES (5, 6);
INSERT INTO `relation` (`path`,`item`) VALUES (6, 7);
INSERT INTO `relation` (`path`,`item`) VALUES (6, 8);
INSERT INTO `relation` (`path`,`item`) VALUES (8, 9);
INSERT INTO `relation` (`path`,`item`) VALUES (8, 10);
INSERT INTO `relation` (`path`,`item`) VALUES (9, 11);
INSERT INTO `relation` (`path`,`item`) VALUES (9, 12);
INSERT INTO `relation` (`path`,`item`) VALUES (9, 13);
INSERT INTO `relation` (`path`,`item`) VALUES (9, 14);



















