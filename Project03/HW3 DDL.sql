drop   database if exists     CSPS_431_HW3;
create database if not exists CSPS_431_HW3;


drop user if exists 'phpWebEngine';
grant select, insert, delete, update, execute on CSPS_431_HW3.* to 'phpWebEngine' identified by 'withheld';



use CSPS_431_HW3;

CREATE TABLE TeamRoster
( ID            INTEGER UNSIGNED  NOT NULL    AUTO_INCREMENT  PRIMARY KEY,
  Name_First    VARCHAR(100),
  Name_Last     VARCHAR(150)      NOT NULL,
  Street        VARCHAR(250),
  City          VARCHAR(100),
  State         VARCHAR(100),
  Country       VARCHAR(100),
  ZipCode       CHAR(10),

  -- Zip code rules:
  --   5 digits, not all are zero and not all are nine, 
  --   optionally followed by a hyphen and 4 digits, not all are zero and not all are nine.
  CHECK (ZipCode REGEXP '(?!0{5})(?!9{5})\\d{5}(-(?!0{4})(?!9{4})\\d{4})?'),
  
  INDEX  (Name_Last),
  UNIQUE (Name_Last, Name_First)
);

INSERT INTO TeamRoster VALUES
('100', 'Donald',               'Duck',    '1313 S. Harbor Blvd.',    'Anaheim',            'CA',            'USA',     '92808-3232'),
('101', 'Daisy',                'Duck',    '1180 Seven Seas Dr.',     'Lake Buena Vista',   'FL',            'USA',     '32830'),
('102', 'Mickey',               'Mouse',   '1313 S. Harbor Blvd.',    'Anaheim',            'CA',            'USA',     '92808-3232'),
('103', 'Pluto',                'Dog',     '1313 S. Harbor Blvd.',    'Anaheim',            'CA',            'USA',     '92808-3232'),

('104', 'Scrooge',              'McDuck',  '1180 Seven Seas Dr.',     'Lake Buena Vista',   'FL',            'USA',     '32830'),
('105', 'Huebert (Huey)',       'Duck',    '1110 Seven Seas Dr.',     'Lake Buena Vista',   'FL',            'USA',     '32830'),
('106', 'Deuteronomy (Dewey)',  'Duck',    '1110 Seven Seas Dr.',     'Lake Buena Vista',   'FL',            'USA',     '32830'),
('107', 'Louie',                'Duck',    '1110 Seven Seas Dr.',     'Lake Buena Vista',   'FL',            'USA',     '32830'),
('108', 'Phooey',               'Duck',    '1-1 Maihama Urayasu',     'Chiba Prefecture',   'Disney Tokyo',  'Japan',   NULL),

('109', 'Della',                'Duck',    '77700 Boulevard du Parc', 'Coupvray',           'Disney Paris',  'France',  NULL);



CREATE TABLE Statistics
(
  ID                INTEGER    UNSIGNED  NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  Player            INTEGER    UNSIGNED  NOT NULL,
  PlayingTimeMin    TINYINT(2) UNSIGNED  DEFAULT 0 COMMENT 'Two 20-minute halves',
  PlayingTimeSec    TINYINT(2) UNSIGNED  DEFAULT 0,
  Points            TINYINT    UNSIGNED  DEFAULT 0,
  Assists           TINYINT    UNSIGNED  DEFAULT 0,
  Rebounds          TINYINT    UNSIGNED  DEFAULT 0,

  FOREIGN KEY (Player) REFERENCES TeamRoster(ID) ON DELETE CASCADE,

  CHECK((PlayingTimeMin < 40 AND PlayingTimeSec < 60) OR 
        (PlayingTimeMin = 40 AND PlayingTimeSec = 0 ))
);

INSERT INTO Statistics VALUES
('17', '100', '35', '12', '47', '11', '21'),
('18', '102', '13', '22', '13', '01', '03'),
('19', '103', '10', '00', '18', '02', '04'),
('20', '107', '02', '45', '09', '01', '02'),
('21', '102', '15', '39', '26', '03', '07'),
('22', '100', '29', '47', '27', '09', '08');

