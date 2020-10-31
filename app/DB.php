<?php
namespace app;

class DB
{
    private static $_pdo;

    public static function query( $sql, array $params = [] )
    {
        self::connect();

        try
        {
            $data = self::$_pdo -> prepare( $sql );

            $data -> execute( $params );

            return $data;
        }
        catch ( \PDOException $e )
        {
            exit( 'Ошибка' );
        }
    }

    public static function getPDO()
    {
        self::connect();

        return self::$_pdo;
    }

    protected static function connect()
    {
        if ( isset( self::$_pdo ) )
            return self::$_pdo;

        try
        {
            self::$_pdo = new \PDO(
                'mysql:host=localhost;dbname=test', 'root', 'password', [
                    \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8', time_zone = '+00:00'",
                    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                ]
            );
        }
        catch ( \PDOException $e )
        {
            exit( 'Подключение не удалось: ' . $e -> getMessage() );
        }

        return self::$_pdo;
    }

}
