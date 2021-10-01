`Dieser Stylguide ist in Überarbeitung`

### How-To-Use

Der Styleguide soll eine Übersicht liefern, wie das CSS des Quantum Themes aufgebaut ist.<br>

Zusätzlich soll er als Unterstützung im Development dienen, da alle genutzen CSS-Styles aufgeführt werden.

### Atomic Design

Das Quantum Theme nutzen den Atomic Design Ansatz.<br>
\_Siehe [Brad Frost - Atomic Design](https://bradfrost.com/blog/post/atomic-web-design/)<br>

Hierbei wird von den kleinstmöglichen Elemente ausgehend, ein System aufgebaut.<br>

- `atoms`
  - buttons, paragraphs, headings
- `molecules`
  - input and label, searchbar and button
- `organisms`
  - header or footer

Zudem werden im Quantum unter `generic` und `nucleus` weitere Styles beschrieben.

### Development Ornderstruktur

Es ergibt sich folgende Struktur:<br>

```
postcss
│   main.md
│   main.txt
|
└───0-generic
|
└───1-nucleus
|
└───2-atoms
|
└───3-molecules
|
└───4-organisms

```

<br><br><br>

> **Autor:** Michael Geyer<br>** Version: **v0.1.0<br>
