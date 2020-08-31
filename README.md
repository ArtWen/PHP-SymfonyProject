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
* 	Widok _index_ na stronie głównej, prezentujący w formie listy dodane opisy projektów. Widok posiada możliwość przejścia do panelu logowania oraz zakładki about.
*	Widok _projektu,_ który zawiera więcej informacji o projekcie niż prezentuje to lista na widoku index.
*	Widok _search_, na którym można wyszukiwać projekty.
*	Widok _about_, zawierający informacje o aplikacji oraz dane kontaktowe twórców.
*	Widok _logowania_, za pomocą którego użytkownik może się zalogować do aplikacji.
*	_Panel administracyjny projektów_, czyli lista projektów wraz z możliwością ich dodania, modyfikacji i usunięcia.
*	_Widok edycji projektu_, gdzie można edytować i usunąć projekt.
	
## Kontrolery
* 	_ProjectController_, pozwalający wylistować listę wszystkich projektów oraz pokazać konretny projekt.
*	_AboutController_, odpowiedzialny za wyświetlenie strony about.
*	_SecurityController_, obsługuje logowanie i wylogowywanie się na stronie.
*	_AdminPanelController_, pozwala na zarządzanie całą listą dodanych projektów, w tym listowanie, edycja, usunięcie, dodanie nowego.

## Modele

### Project
*	id: _int_
*	user: _User_
*	title: _string_
*	summary: _string_
*	description: _Text_
*	date: _DateTime_
*	updated: _DateTime?_
*	image: _string?_
*	imageFile: _File?_
*	projectPackageName: _string?_
*	projectPackage: _File?_
*	getId(): _int?_
*	getUser(): _User?_
*	setUser(_User?_): _self_
*	getTitle(): _string?_
*	setTitle(_string_): _self_
*	getSummary(): _string?_
*	setSummary(_string_): _self_
*	getDescription(): _string?_
*	setDescription(_string_): _self_
*	getDate(): _DateTimeInterface?_
*	setDate(_DateTimeInterface_): _self_
*	getUpdated(): _DateTimeInterface?_
*	setUpdated(_DateTimeInterface?_): _void_
*	getImage(): _string?_
*	setImage(_string?_): _void_
*	getImageFile(): _File?_
*	setImageFile(_File?_): _void_
*	getProjectPackageName(): _string?_
*	setProjectPackageName(_string?_): _void_
*	getProjectPackage(): _File?_
*	setProjectPackage(_File?_): _void_

### User
*	id: _int_
*	username: _string_
*	roles: _Json_
*	password: _string_
*	projects: _Project[]_
*	getId(): _int?_
*	getUsername(): _string_
*	setUsername(_string_): _self_
*	getRoles(): _Array_
*	setRoles(_Array_): _self_
*	getPassword(): _string_
*	setPassword(_string_): _self_
*	getSalt(): _void_
*	eraseCredentials(): _void_
*	getProjects(): _Collection_
*	addProject(_Project_): _self_
*	removeProject(_Project_): _self_

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
