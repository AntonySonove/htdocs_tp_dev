CREATE USER "antony"@"localhost" IDENTIFIED BY "Kaibacorp1.";
GRANT SELECT, INSERT, UPDATE ON *.* TO "antony"@"localhost";
FLUSH PRIVILEGES;
CREATE USER "antony2"@"localhost" IDENTIFIED BY "Kaibacorp1.";
GRANT SELECT, INSERT, UPDATE ON *.* TO "antony2"@"localhost";
FLUSH PRIVILEGES;