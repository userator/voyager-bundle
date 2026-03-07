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

## Настройка AssetMapper

Bundle использует Symfony AssetMapper для управления ассетами.

### 1. Установите AssetMapper (если ещё не установлен)

```console
$ composer require symfony/asset-mapper
```

### 2. Настройте AssetMapper

```yaml
# config/packages/framework.yaml
framework:
    asset_mapper:
        paths:
            - '%kernel.project_dir%/vendor/userator/voyager-bundle/public'
```

### 3. Добавьте ассеты Voyager в importmap

```php
// importmap.php
return [
    'app' => [
        // ...
    ],
    'voyager' => [
        'path' => 'vendor/userator/voyager-bundle/public/voyager.min.js',
        'entrypoint' => true,
    ],
    'react' => [
        'path' => 'vendor/userator/voyager-bundle/public/react.production.min.js',
    ],
    'react-dom' => [
        'path' => 'vendor/userator/voyager-bundle/public/react-dom.production.min.js',
    ],
];
```

## Конфигурация

### Доступные параметры

| Параметр | Тип | По умолчанию | Описание |
|----------|-----|--------------|----------|
| `enabled` | `bool` | `true` | Включить/выключить Voyager |
| `title` | `string` | `'GraphQL Voyager'` | Заголовок страницы |
| `endpoint` | `string` | `'/graphql'` | GraphQL endpoint |

### Примеры конфигурации

#### YAML

```yaml
# config/packages/voyager.yaml
userator_voyager:
    enabled: true
    title: 'My GraphQL API'
    endpoint: '/api/graphql'
```

## Маршрут

По умолчанию Voyager доступен по адресу:

```
/graphql/voyager
```

## Требования

- PHP 8.2+
- Symfony 6.4+ или 7.0+
- Twig 3.4+
