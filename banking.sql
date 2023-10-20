SET SQL_MODE = "NO_AUTO_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE 'Customers' (
    'NAME' text NOT NULL,
    'EMAIL' text NOT NULL,
    'ACCOUNT_NO' int(10) NOT NULL,
    'BALANCE' int(10) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO 'Customers' ('NAME','EMAIL','ACCOUNT_NO', 'BALANCE') VALUES
 ('AARAV', 'aarav1803@gmail.com', 1018032012, 500000),
 ('CHITRA', 'chitrasharma2407@gmail.com',1024072002, 400000),
 ('PRERNA', 'prerna1907@gmail.com', 1019072001, 450000),
 ('ANITA', 'anita0611@gmail.com', 1006112002, 500000),
 ('JISHU', 'jishpratap@gmail.com', 1026032003, 600000),
 ('ISHIKA', 'ishika01@gmail.com',1001112002, 650000),
 ('LAKSHAY','lakshay23@gmail.com',1023112008,875000),
 ('SONIYA','soniya08@gmail.com',1008082005,550000),
 ('ARCHITA', 'archita24@gmail.com',1024082010, 525000),
 ('PRATYAKSH','pratyaksh24@gmail.com',1024082002,500000);

CREATE TABLE 'Transaction'(
    'ID' int(10) NOT NULL,
    'SENDERS_ACCOUNT_NO' int(10) NOT NULL,
    'SENDERS_NAME' text NOT NULL,
    'RECEIVERS_ACCOUNT_NO' text NOT NULL,
    'RECEIVERS_NAME' text NOT NULL,
    'AMOUNT_TRANSFERRED' int(10) NOT NULL,
    'SENDERS_BALANCE' int(10) NOT NULL,
    'RECEIVERS_BALANCE' int(10) NOT NULL, 
    'TRANSACTION_STATUS' text NOT NULL,
    'TIME' datetime NOT NULL DEFAULT current_timestamp()
)ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

