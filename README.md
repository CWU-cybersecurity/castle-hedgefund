# Castle Hedgfund offical website

## Starting the application:

- Start MySQL:

(To first initialize the db)
```bash
&'C:\wamp64\bin\mysql\mysql9.1.0\bin\mysqld.exe' --initialize-insecure --console
```

```bash
&'C:\wamp64\bin\mysql\mysql9.1.0\bin\mysqld.exe' --init-file="$PWD\sql\create_my_guitar_shop.sql" --console
```

- Start PHP Server:
```bash
php -S localhost:8000
```
