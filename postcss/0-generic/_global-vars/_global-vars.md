Quantum nutzt globale CSS Variablen, welche widerum im Child Theme überschrieben werden können.

```
:root {
  --max-site-width: 1440px;
  --site-spacing-left: 5%;
  --site-spacing-right: 5%;
}
```

Quantum nutzt Grautöne als Standardfarben.
Das ist eine zweite Zeile.

```example:color
@color: hsl(0, 0%, 50%) @name: Primary
@color: hsl(0, 0%, 75%) @name: Secondary
@color: hsl(20, 10%, 50%) @name: Accent
@color: hsl(0, 0%, 20%) @name: Text
```
