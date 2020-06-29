# PHP-SymfonyProject
Członkowie grupy: Moryń Maciej, Wenda Artur

# Spis treści
1. [Informacje ogólne](#informacje-ogólne)
    * [Konfiguracja i uruchamianie](#konfiguracja-i-uruchamianie)
2. [Technologie](#użyte-technologie)
3. [Wartstwy MVC](#warstwy-mvc)
	* i. [Widoki](#widoki)
	* ii. [Kontrolery](#kontrolery)
	* iii. [Modele](#modele)
		+ [Project](#project)
		+ [User](#user)
4. [Bazy Danych](#baza-danych)
	* [Tabele](#tabele)
		+ [Project](#project)
		+ [Users](#users)

# Informacje ogólne
Aplikacja internetowa do umieszczania projektów z opisami i postów o projektach.
Użytkownicy mogą przeglądać wszystkie udostępnione opisy a administracja może dodawać, edytować lub usuwać posty.
## Konfiguracja i uruchamianie
Informacje związane z konfigracją i ustawianiem lokalnego serwera z projektem można znaleźć tutaj: [instrukcja.md](/Konfiguracja/instrukcja.md)

# Użyte technologie
- [HTML](https://www.w3schools.com/html/)
- [CSS](https://www.w3schools.com/css/)
- SCSS
- [JavaScript](https://www.w3schools.com/js/)
- [PhP](https://www.php.net/)
- [Symfony](https://symfony.com/)
- [Twig](https://twig.symfony.com/)
- [MySQL](https://www.mysql.com/)
- [Node JS](https://nodejs.org/en/)
- [Bootstrap](https://getbootstrap.com/)
- [Bootswatch](https://bootswatch.com/)

# Warstwy MVC

## Widoki
* 	Widok index, na stronie głównej prezentujący w formie listy dodane opisy projektów, możliwość przejścia do panelu logowania oraz zakładki about
*	Panel administracyjny projektów, lista projektów wraz z możliwością dodania, modyfikacji i usunięcia projektu
*	Widok logowania, czyli logowanie się na stronę
*	Widok edycji danych, czyli możliwośc edycji danych użytkownika
*	Widok edycji projektu, gdzie można edytować i usunąć projekt
*	Widok projektu
	
## Kontrolery
- 	ProjectController, pozwalający wylistować listę wszystkich projektów oraz pokazać konretny projekt
-   AdminPanelController, pozwala na zarządzanie całą listą dodanych projektów, w tym listowanie, edycja, usunięcie, dodanie nowego
-   AboutController, odpowiedzialny za wyświetlenie strony about
- 	SecurityController, obsługuje logowanie i wylogowywanie się na stronie

## Modele

### Project
- id: int
- title: string
- summary: string 
- description: string
- date: DateTime
- user: User
- getTitle(): string?
- setTitle(): void
- getDescription(): string?
- setDescription(): void
- getDate(): DateTime
- setDate(): void
- getUser(): User?
- setUser(): void
- getSummary(): string?
- setSummary(): void

### User
- id: int
- username: string
- password: string
- roles: array
- getId(): int?
- getUsername(): string?
- setUsername(): void
- getPassword(): string?
- setPassword(): void
- getRoles(): array
- setRoles(): void
- getSalt(): string?
- eraseCredentials(): void

# Baza Danych
## Tabele

### project
- id: int(11)
- user_id: int(11)
- title: varchar(255)
- summary: varchar(255)
- description: longtext
- date: datetime

### users
- id: int(11)
- username: varchar(180)
- password: varchar(255)
- roles: longtext
