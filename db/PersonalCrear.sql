DROP DATABASE IF EXISTS  PersonalUAB;
CREATE DATABASE PersonalUAB;
USE PersonalUAB;

CREATE TABLE estadoCivil(
	idEstadoCivil int not null auto_increment primary key,
	nombreEstadoCivil varchar(35) not null
);


CREATE TABLE persona(
	idPersona int not null auto_increment primary key,
	primerNombre varchar(15) not null,
	segundoNombre varchar(15) null,
	apellidoPaterno varchar(15) not null,
	segundoApellido varchar(15) not null,
	CI varchar(15) not null,
	lugarExpedicion varchar(30) not null,
	fechaNacimiento date not null,
	sexo enum('F','M') not null,
	idEstadoCivil int not null,
	FOREIGN KEY (idEstadoCivil) REFERENCES estadoCivil (idEstadoCivil) ON UPDATE CASCADE ON DELETE CASCADE
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

CREATE TABLE nacion(
	idNacion int not null auto_increment primary key,
	nombreNAcion varchar(50) not null
);

CREATE TABLE seguro(
	idSeguro int not null auto_increment primary key,
	nombreSeguro varchar(50) not null
);

CREATE TABLE afp(
	idAfp int not null auto_increment primary key,
	nombreAfp varchar(50) not null
);

CREATE TABLE tipoPerosnal(
	idTipoPersonal int not null auto_increment primary key,
	nombreTipoPersonal varchar(80) not null
);

CREATE TABLE facultad(
	idFacultad int not null auto_increment primary key,
	nombreFacultad varchar(100) not null
);

CREATE TABLE carrera(
	idCarerra int not null auto_increment primary key,
	idFacultad int not null,
	nombreCarrera varchar(100) not null,
	FOREIGN KEY (idFacultad) REFERENCES facultad (idFacultad) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE personal(
	idPersonal int not null auto_increment primary key,
	idPersona int not null,
	idNacion int not null,
	idTipoPersonal int null,
	idCarerra int null,
	direccion varchar(100) not null,
	email varchar(50) null,
	ciudadNacimiento varchar(60) not null,
	religion varchar(50) null,
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
	fechaIngreso date not null,
	FOREIGN KEY (idPersona) REFERENCES persona (idPersona) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idNacion) REFERENCES nacion (idNacion) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idSeguro) REFERENCES seguro (idSeguro) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idAfp) REFERENCES afp (idAfp) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idTipoPersonal) REFERENCES tipoPerosnal (idTipoPersonal) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idCarerra) REFERENCES carrera (idCarerra) ON UPDATE CASCADE ON DELETE CASCADE
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

CREATE TABLE cusrsoEstudiado(
	idCursoEstudiado int not null auto_increment primary key,
	idPersonal int not null,
	nombreInstitucion varchar(100) not null,
	cursoEstudiado varchar(100) not null,
	anhoEstudio int not null,
	religionInstitucion varchar(50) null,
	respaldoTituloPDF varchar(200) null,
	FOREIGN KEY (idPersonal) REFERENCES personal (idPersonal) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE cargo(
	idCargo int not null auto_increment primary key,
	nombreCargo varchar(100) not null
);

CREATE TABLE cargoPersonal(
	idCargo int not null,
	idPersonal int not null,
	FOREIGN KEY (idCargo) REFERENCES cargo (idCargo) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (idPersonal) REFERENCES personal (idPersonal) ON UPDATE CASCADE ON DELETE CASCADE
);
