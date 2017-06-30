DROP DATABASE IF EXISTS  PersonalUAB;
CREATE DATABASE PersonalUAB;
USE PersonalUAB;

CREATE TABLE estadoCivil(
	idEstadoCivil int not null auto_increment primary key,
	nombreEstadoCivil varchar(35) not null
);

CREATE TABLE nacion(
	idNacion int not null auto_increment primary key,
	nombreNacion varchar(50) not null
);

CREATE TABLE lugarExpedicion(
	idLugarExpedicion int not null auto_increment primary key,
	nombreLugarExpedicion varchar(80) not null
);

CREATE TABLE persona(
	idPersona int not null auto_increment primary key,
	primerNombre varchar(20) not null,
	segundoNombre varchar(20) null,
	apellidoPaterno varchar(20) not null,
	apellidoMaterno varchar(20) null,
	CI varchar(40) not null,
	idLugarExpedicion int null,
	fechaNacimiento date null,
	sexo enum('F','M') null,
	idEstadoCivil int null,
	FOREIGN KEY (idEstadoCivil) REFERENCES estadoCivil (idEstadoCivil) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idLugarExpedicion) REFERENCES lugarExpedicion (idLugarExpedicion) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE tipoUsuario(
	idTipoUsuario int not null auto_increment primary key,
	NombreTipoUsuario varchar(30) not null
);

CREATE TABLE usuario(
	idUsuario int not null auto_increment primary key,
	idPersona int not null,
	idTipoUsuario int not null,
	usuario varchar(15) unique not null,
	contrasena varchar(70) not null,
	estado bool not null,
	borrado bool not null,
	FOREIGN KEY (idPersona) REFERENCES persona (idPersona) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idTipoUsuario) REFERENCES tipoUsuario (idTipoUsuario) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE seguro(
	idSeguro int not null auto_increment primary key,
	nombreSeguro varchar(70) not null
);

CREATE TABLE afp(
	idAfp int not null auto_increment primary key,
	nombreAfp varchar(50) not null
);

CREATE TABLE tipoPersonal(
	idTipoPersonal int not null auto_increment primary key,
	nombreTipoPersonal varchar(80) not null
);

CREATE TABLE facultad(
	idFacultad int not null auto_increment primary key,
	nombreFacultad varchar(100) not null
);

CREATE TABLE carrera(
	idCarrera int not null auto_increment primary key,
	idFacultad int not null,
	nombreCarrera varchar(100) not null,
	FOREIGN KEY (idFacultad) REFERENCES facultad (idFacultad) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE ciudad(
	idCiudad int not null auto_increment primary key,
	nombreCiudad varchar(60) not null
);

CREATE TABLE religion(
	idReligion int not null auto_increment primary key,
	nombreReligion varchar(70) not null
);

CREATE TABLE cargo(
	idCargo int not null auto_increment primary key,
	nombreCargo varchar(100) not null
);

CREATE TABLE cargoPersona(
	idCargoPersona int not null auto_increment primary key,
	nombreCargoPersona varchar(100) not null
);

CREATE TABLE personal(
	idPersonal int not null auto_increment primary key,
	idPersona int not null,
	idNacion int not null,
	idTipoPersonal int null,
	idCarrera int null,
	idCargoPersona int null,
	direccion varchar(100) not null,
	email varchar(50) null,
	idCiudad int not null,
	idReligion int null,
	fechaBautizmo date null,
	idSeguro int null,
	numeroSeguro int null,
	idAfp int null,
	numeroAfp int null,
	numeroLibretaMilitar int null,
	numeroPasaporte varchar(30) null,
	tipoSangre varchar(10) null,
	hobby varchar(70) null,
	lecturaPreferencial varchar(100) null,
	numeroRegistroProfesional varchar(50) null,
	fechaIngreso date not null,
	rutaFoto varchar(200) null,
	FOREIGN KEY (idCargoPersona) REFERENCES cargoPersona (idCargoPersona) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idPersona) REFERENCES persona (idPersona) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idNacion) REFERENCES nacion (idNacion) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idSeguro) REFERENCES seguro (idSeguro) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idAfp) REFERENCES afp (idAfp) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idTipoPersonal) REFERENCES tipoPersonal (idTipoPersonal) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idCarrera) REFERENCES carrera (idCarrera) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idCiudad) REFERENCES ciudad (idCiudad) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idReligion) REFERENCES religion (idReligion) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE enfermedad(
	idEnfermedad int not null auto_increment primary key,
	nombreEnfermedad varchar(100) not null
);

CREATE TABLE enfermedadPersonal(
	idEnfermedad int not null,
	idPersonal int not null,
	FOREIGN KEY (idEnfermedad) REFERENCES enfermedad (idEnfermedad) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idPersonal) REFERENCES personal (idPersonal) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE deporte(
	idDeporte int not null auto_increment primary key,
	nombreDeporte varchar(50) not null
);

CREATE TABLE deportePersonal(
	idDeporte int not null,
	idPersonal int not null,
	FOREIGN KEY (idDeporte) REFERENCES deporte (idDeporte) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idPersonal) REFERENCES personal (idPersonal) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE referenciaPersonal(
	idReferenciaPersonal int not null auto_increment primary key,
	idPersona int not null,
	idPersonal int not null,
	FOREIGN KEY (idPersona) REFERENCES persona (idPersona) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idPersonal) REFERENCES personal (idPersonal) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE telefono(
	idTelefono int not null auto_increment primary key,
	idPersona int not null,
	numeroTelefono int not null,
	FOREIGN KEY (idPersona) REFERENCES persona (idPersona) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE conyuguePersonal(
	idConyuguePersonal int not null auto_increment primary key,
	idPersona int not null,
	idPersonal int not null,
	fechaMatrimonio date null,
	FOREIGN KEY (idPersona) REFERENCES persona (idPersona) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idPersonal) REFERENCES personal (idPersonal) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE hijosPersonal(
	idHijosPersonal int not null auto_increment primary key,
	idPersona int not null,
	idPersonal int not null,
	FOREIGN KEY (idPersona) REFERENCES persona (idPersona) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idPersonal) REFERENCES personal (idPersonal) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE tipoTituloProfesional(
	idTipoTituloProfesional int not null auto_increment primary key,
	nombreTipoTitulo varchar(50) not null
);

CREATE TABLE tituloProfesional(
	idTituloProfesional int not null auto_increment primary key,
	idTipoTituloProfesional int not null,
	idPersonal int not null,
	nombreInstitucion varchar(100) not null,
	cursoProfesionalEstudiado varchar(100) not null,
	tiempoEstudio int not null,
	religionInstitucion varchar(50) null,
	respaldoTituloPDF varchar(200) null,
	FOREIGN KEY (idTipoTituloProfesional) REFERENCES tipoTituloProfesional (idTipoTituloProfesional) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idPersonal) REFERENCES personal (idPersonal) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE cursoEstudiado(
	idCursoEstudiado int not null auto_increment primary key,
	idPersonal int not null,
	nombreInstitucion varchar(100) not null,
	cursoEstudiado varchar(100) not null,
	anhoEstudio int not null,
	religionInstitucion varchar(50) null,
	respaldoTituloPDF varchar(200) null,
	FOREIGN KEY (idPersonal) REFERENCES personal (idPersonal) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE cargoPersonal(
	idCargo int not null,
	idPersonal int not null,
	FOREIGN KEY (idCargo) REFERENCES cargo (idCargo) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idPersonal) REFERENCES personal (idPersonal) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE experienciaLaboral(
	idExperienciaLaboral int not null auto_increment primary key,
	idPersonal int not null,
	nombreInstitucion varchar(100) not null,
	cargoResponsabilidad varchar(100) not null,
	aniosDeServicio int not null,
	religionInstitucion varchar(50) null,
	motivoRetiro varchar(100) null,
	FOREIGN KEY (idPersonal) REFERENCES personal (idPersonal) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Tabla de Calificacion de Meritos tanto para docente y profesor
CREATE TABLE tablaMeritosDocenteProfesor(
	idTablaMeritoDocenteProfesor int not null auto_increment primary key,
	version varchar(12) not null,
	tipoMerito varchar(20) not null, -- docente/profesor
	fechaCreacion date not null,
	activo bool not null
);

CREATE TABLE personalTablaMeritosDocenteProfesor(
	idPersonal int not null,
	idTablaMeritoDocenteProfesor int not null,
	FOREIGN KEY (idPersonal) REFERENCES personal (idPersonal) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idTablaMeritoDocenteProfesor) REFERENCES tablaMeritosDocenteProfesor (idTablaMeritoDocenteProfesor) ON UPDATE CASCADE ON DELETE CASCADE
);

-- tabla reflexiva
CREATE TABLE estructuraMeritos(
	idEstructuraMerito int not null auto_increment primary key,
	idTablaMeritoDocenteProfesor int not null,
	idEstructuraMeritoPrimario int default null, -- cuando el merito es primario el valor se registrara con NULL, pero si es un SUB-Merito entonces se registrara el codigo del merito PRIMARIO.
	nombreMerito varchar(300) not null,
	puntajeMerito int not null,
	FOREIGN KEY(idTablaMeritoDocenteProfesor) REFERENCES tablaMeritosDocenteProfesor (idTablaMeritoDocenteProfesor) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idEstructuraMeritoPrimario) REFERENCES estructuraMeritos (idEstructuraMerito) ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE evaluacionMeritosDocenteProfesor(
	idPersonal int not null,
	idEstructuraMerito int not null,
	puntajeMerito int not null,
	FOREIGN KEY (idPersonal) REFERENCES personal (idPersonal) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idEstructuraMerito) REFERENCES estructuraMeritos (idEstructuraMerito) ON UPDATE CASCADE ON DELETE CASCADE
);
