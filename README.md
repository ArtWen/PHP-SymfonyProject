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
		+ [Comment](#comment)
4. [Bazy Danych](#baza-danych)
	* [Tabele](#tabele)
		+ [Project](#project)
		+ [Users](#users)
		+ [Comments](#comments)

# Informacje ogólne
Aplikacja internetowa do umieszczania projektów z opisami i postów o projektach, wraz z możliwością wyszukania projektów po tytule oraz podsumowaniu.
Użytkownicy mogą przeglądać wszystkie udostępnione opisy oraz pobierać pliki projektów (jeśli zostały dołączone) i dodawać komentarze, a administracja może dodawać, edytować lub usuwać posty. Komentarze mogą zostać usunięte jedynie przez administrację oraz autora komentarza.

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
*	Widok _rejestracji_, na którym użytkownicy zakładają nowe konto.
*	_Panel administracyjny projektów_, czyli lista projektów wraz z możliwością ich dodania, modyfikacji i usunięcia.
*	_Widok edycji projektu_, gdzie można edytować i usunąć projekt.
	
## Kontrolery
* 	_ProjectController_, pozwalający wylistować listę wszystkich projektów oraz pokazać konretny projekt i jego komentarze; pozwala również na wyszukiwanie projektów po tekście i podsumowaniu; obsługuje dodawanie i usuwanie komentarzy.
*	_AboutController_, odpowiedzialny za wyświetlenie strony about.
*	_SecurityController_, obsługuje logowanie i wylogowywanie się na stronie oraz rejestrację nowych użytkowników.
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
*	comments: _Comment[]_
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
*	getComments(): _Comments[]_
*	addComment(_Comment_): _self_
*	removeComment(_Comment_): _self_

### User
*	id: _int_
*	username: _string_
*	email: _string_
*	comments: _Comment[]_
*	roles: _Json_
*	password: _string_
*	projects: _Project[]_
*	getId(): _int?_
*	getUsername(): _string_
*	setUsername(_string_): _self_
*	getEmail(): _string_
*	setEmail(_string_): _self_
*	getComments(): _Comments[]_
*	addComment(_Comment_): _self_
*	removeComment(_Comment_): _self_
*	getRoles(): _Array_
*	setRoles(_Array_): _self_
*	getPassword(): _string_
*	setPassword(_string_): _self_
*	getSalt(): _void_
*	eraseCredentials(): _void_
*	getProjects(): _Collection_
*	addProject(_Project_): _self_
*	removeProject(_Project_): _self_

### Comment
*	id: _int_
*	text: _string_
*	author: _User_
*	project: _Project_
*	date: _DateTime_
*	getId(): _int_
*	getText(): _string_
*	setText(_string_): _self_
*	getAuthor(): _User_
*	setAuthor(_User_): _self_
*	getProject(): _Project_
*	setProject(_Project_): _self_
*	getDate(): _DateTime_
*	setDate(_DateTime_): _self_

# Baza Danych
## Tabele

### project
*	id: _int(11)_
*	user_id: _int(11)_
*	title: _varchar(255)_
*	summary: _varchar(255)_
*	description: _longtext_
*	date: _datetime_
*	updated: _datetime_
*	image: _varchar(255)_
*	project_package_name: _varchar(255)_

### users
*	id: _int(11)_
*	username: _varchar(180)_
*	roles: _longtext_
*	password: _varchar(255)_

### comments
*	id: _int(11)_
*	author_id: _int(11)_
*	project_id: _int(11)_
*	text: _varchar(255)_
*	date: _datetime_
