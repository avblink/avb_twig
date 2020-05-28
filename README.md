# Drupal Twig Extension by AVB Link

Contains Drupal Twig functions and filters.

- Get current entity from path.
```twig
{% set node = avb_twig_current_entity('node') %}
```
  
- Assign new Attribute() class to a variable
```twig
{% set attributes = avb_twig_create_attribute(['class', ['class1', 'class2']]) %}
{{ avb_twig_create_attribute().addClass(['class1', 'class2'])}}
```

- Add '*style*' attribute
```twig
{% set attributes = avb_twig_create_attribute().addStyle({'background-color': 'red'}) %}
```
