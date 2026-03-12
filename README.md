# Voyager Bundle

Symfony Bundle для интеграции [GraphQL Voyager](https://github.com/APIs-guru/graphql-voyager) в Symfony-приложения.

## Установка

### Composer

```console
$ composer require userator/voyager-bundle
```

### Включение Bundle

```php
// config/bundles.php
return [
    // ...
    Userator\VoyagerBundle\VoyagerBundle::class => ['all' => true],
];
```

## Конфигурация

### Доступные параметры

| Параметр | Тип | По умолчанию | Описание |
|----------|-----|--------------|----------|
| `endpoint` | `string` | `'/graphql'` | GraphQL endpoint |

### Примеры конфигурации

#### YAML

```yaml
# config/packages/userator_voyager.yaml
userator_voyager:
    endpoint: '/graphql'
```

## Маршрут

По умолчанию Voyager доступен по адресу:

```
/voyager
```

## Требования

- PHP 8.2+
- Symfony 6.4+
- Twig 3.4+
