CREATE TABLE sportsmen (
    id INT AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(10),
    birthday DATE,
    age INT,
    created_at DATETIME,
    passport VARCHAR(10),
    average_place INT,
    biography TEXT,
    presentation VARCHAR(255),
    PRIMARY KEY(id)
)

SELECT      sportsmen.name
FROM        sportsmen
LEFT JOIN   results on sportsmen.id = results.sportsman_id
GROUP BY    sportsmen.id
ORDER BY    COUNT(DISTINCT results.competition_id) desc
LIMIT       5