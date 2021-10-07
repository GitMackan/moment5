# Moment 5 - Steg 2

## Lösning:
Denna uppgift, att skapa en REST-webbtjänst har gjorts i följande steg:

### Anslutning till databas
För att kunna skapa denna webbtjänst och konsumera den från en annan hemsida har en databasanslutning gjorts med PHP. I denna databas har en tabell skapats med olika rader som håller olika värden för en kurs.

### Klass
En klass har sedan gjorts i PHP för att hantera datan som kommer att hanteras i webbtjänsten. Klassen består av 6 olika funktioner. Dessa funktioner är en konstruktor, som skapar en anslutning till databasen när ett nytt objekt initieras, en klass för att lägga till data, en för att hämta data, en för att hämta en specifik kurs, en för att ta bort data och en för att uppdatera data.

### API
Slutligen har själva API-sidan skapats som kommer att kommunicera med webbsidan som ska konsumera denna webbtjänst. Denna struktur bygger på olika switch cases, beroende på vad som skickas till webbtjänsten, om det är GET, POST, PUT eller DELETE, där varje case har en lösning på att antingen hämta, lägga till, uppdatera eller ta bort data. Dessa lösningar använder sig av funktioner skapade i klassen som gjorts. 