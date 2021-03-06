INSERT INTO estadoCivil VALUE( null, "Soltero(a)" );
INSERT INTO estadoCivil VALUE( null, "Casado(a)" );
INSERT INTO estadoCivil VALUE( null, "Viudo(a)" );
INSERT INTO estadoCivil VALUE( null, "Divorciado(a)" );

INSERT INTO lugarExpedicion VALUE( null, "OR" );
INSERT INTO lugarExpedicion VALUE( null, "LPZ" );
INSERT INTO lugarExpedicion VALUE( null, "CBBA" );
INSERT INTO lugarExpedicion VALUE( null, "SCZ" );
INSERT INTO lugarExpedicion VALUE( null, "TRJ" );
INSERT INTO lugarExpedicion VALUE( null, "BEN" );

INSERT INTO persona VALUE(null, "Rodrigo", "Luis", "Poma", "Mollo", "447457451", 2, "1995-03-20", 'M', 1);
INSERT INTO persona VALUE(null, "Gustavo", "Angel", "Cerezo", "Mamani", "7417215", 1, "1995-03-30", 'M', 1);

INSERT INTO tipoUsuario VALUE(null, "Administrador");
INSERT INTO tipoUsuario VALUE(null, "Asistente");
INSERT INTO tipoUsuario VALUE(null, "Personal Academico");
INSERT INTO tipoUsuario VALUE(null, "Personal de Planta");
INSERT INTO tipoUsuario VALUE(null, "Profesor");
INSERT INTO tipoUsuario VALUE(null, "Personal de Servicio");


INSERT INTO usuario VALUE(null, 1, 1, "rodrigo", "rodrigo", 1, 0);
INSERT INTO usuario VALUE(null, 2, 1, "gustavo", "gustavo", 1, 0);


INSERT INTO nacion VALUE(null, "BOLIVIA");
INSERT INTO nacion VALUE(null, "CHILE");
INSERT INTO nacion VALUE(null, "BRASIL");
INSERT INTO nacion VALUE(null, "ECUADOR");

INSERT INTO tipoPersonal VALUE(null, "Personal Academico");
INSERT INTO tipoPersonal VALUE(null, "Personal de Planta");
INSERT INTO tipoPersonal VALUE(null, "Profesores");
INSERT INTO tipoPersonal VALUE(null, "Personal de Servicios");

INSERT INTO facultad VALUE(null, "INGENIERIA");
INSERT INTO facultad VALUE(null, "SALUD");
INSERT INTO facultad VALUE(null, "EDUCACION");
INSERT INTO facultad VALUE(null, "TEOLOGIA");
INSERT INTO facultad VALUE(null, "CIENCIAS ECONOMICAS Y ADMINISTRATIVAS");

INSERT INTO carrera VALUE(null, 1, "SISTEMAS");
INSERT INTO carrera VALUE(null, 1, "AMBIENTAL");
INSERT INTO carrera VALUE(null, 1, "REDES Y TELECOMUNICACIONES");
INSERT INTO carrera VALUE(null, 2, "NUTRICION");
INSERT INTO carrera VALUE(null, 2, "ENFERMERIA");
INSERT INTO carrera VALUE(null, 2, "BIOQUIMICA");
INSERT INTO carrera VALUE(null, 2, "FISIOTERAPIA Y KINESIOLOGIA");
INSERT INTO carrera VALUE(null, 3, "PSICOLOGIA");
INSERT INTO carrera VALUE(null, 3, "PSICOPEDAGOGIA");
INSERT INTO carrera VALUE(null, 3, "EDUCACION FISICA");
INSERT INTO carrera VALUE(null, 4, "TEOLOGIA");
INSERT INTO carrera VALUE(null, 5, "CONTADURIA PUBLICA");
INSERT INTO carrera VALUE(null, 5, "ADMINISTRACION DE EMPRESAS");
INSERT INTO carrera VALUE(null, 5, "AUDITORIA");
INSERT INTO carrera VALUE(null, 5, "COMERCIAL");

INSERT INTO ciudad VALUE(null, "ORURO");
INSERT INTO ciudad VALUE(null, "LA PAZ");
INSERT INTO ciudad VALUE(null, "SANTA CRUZ");
INSERT INTO ciudad VALUE(null, "BENI");
INSERT INTO ciudad VALUE(null, "PANDO");
INSERT INTO ciudad VALUE(null, "POTOSI");
INSERT INTO ciudad VALUE(null, "TARIJA");
INSERT INTO ciudad VALUE(null, "SUCRE");
INSERT INTO ciudad VALUE(null, "COCHABAMBA");
INSERT INTO ciudad VALUE(null, "BUENOS AIRES");
INSERT INTO ciudad VALUE(null, "RIO DE JANEIRO");

INSERT INTO religion VALUE(null, "ADVENTISTA");
INSERT INTO religion VALUE(null, "MORMON");
INSERT INTO religion VALUE(null, "BUDISTA");
INSERT INTO religion VALUE(null, "CATOLICO");
INSERT INTO religion VALUE(null, "JUDIO");
INSERT INTO religion VALUE(null, "MUSULMAN");

INSERT INTO seguro VALUE(null, "CAJA NACIONAL DE SALUD");

INSERT INTO afp VALUE(null, "FUTURO DE BOIVIA S.A. AFP");
INSERT INTO afp VALUE(null, "AFP PREVINCION");
INSERT INTO afp VALUE(null, "AFP FUTURO");

<<<<<<< HEAD
INSERT INTO cargo VALUE(null, "Decano");
INSERT INTO cargo VALUE(null, "Vice-Decano");
INSERT INTO cargo VALUE(null, "Docente");
INSERT INTO cargo VALUE(null, "Profesor");
INSERT INTO cargo VALUE(null, "Secretaria");
INSERT INTO cargo VALUE(null, "Secretario Academico");

INSERT INTO cargoPersona VALUE(null, "Jardinero");
INSERT INTO cargoPersona VALUE(null, "Contador");
INSERT INTO cargoPersona VALUE(null, "Capellan");

INSERT INTO enfermedad VALUE(null, "Rinitis");
INSERT INTO enfermedad VALUE(null, "Asma");
INSERT INTO enfermedad VALUE(null, "Urticaria");
INSERT INTO enfermedad VALUE(null, "Dermatitis");

INSERT INTO deporte VALUE(null, "Futbol");
INSERT INTO deporte VALUE(null, "Futbol de Salon");
INSERT INTO deporte VALUE(null, "Volley");
INSERT INTO deporte VALUE(null, "Basquet");
INSERT INTO deporte VALUE(null, "Tenis");
INSERT INTO deporte VALUE(null, "Natacion");
INSERT INTO deporte VALUE(null, "Wally");
INSERT INTO deporte VALUE(null, "Fronton");
INSERT INTO deporte VALUE(null, "Ajedrez");
INSERT INTO deporte VALUE(null, "Fisicoculturismo");
INSERT INTO deporte VALUE(null, "Rugby");
INSERT INTO deporte VALUE(null, "Futbol Americano");

INSERT INTO tipoTituloProfesional VALUE(null, "Licenciatura");
INSERT INTO tipoTituloProfesional VALUE(null, "Diplomado");
INSERT INTO tipoTituloProfesional VALUE(null, "Maestria");
INSERT INTO tipoTituloProfesional VALUE(null, "Doctorado");

-- DIRECTORIO
-- tipodepartamentocontacto
INSERT INTO tipodepartamentocontacto VALUE(null,"UB");
INSERT INTO tipodepartamentocontacto VALUE(null,"IATec");
INSERT INTO tipodepartamentocontacto VALUE(null,"SPA");

-- departamentocontato
INSERT INTO departamentocontato VALUE (null,1,"Union Boliviana","Av. Simón López 391 – B° Cala Cala – Cochabamba","ub@adv.og.bo","www.ub.adventistas.org","3535","logo");
INSERT INTO departamentocontato VALUE (null,2,"INSTITUTO ADVENTISTA DE TECNOLOGÍA","Av. Simón López 391 – B° Cala Cala – Cochabamba","iatec@adv.og.bo","www.ub.adventistas.org","3535","logo");
INSERT INTO departamentocontato VALUE (null,3,"SERVICIO DE PUBLICACIONES ADVENTISTA","Av. Simón López 391 – B° Cala Cala – Cochabamba","spa@adv.og.bo","www.adventistas.org.bo","3535","logo");

-- fax
INSERT INTO fax VALUE (null,1,"591-4","411-5753");

INSERT INTO telefonoDepartamento VALUE (null,1,"Celular","411-5753","591-4");

INSERT INTO tipoEmpleado VALUE (null,"Obreros de Oficina");

INSERT INTO responsabilidad VALUE (null,"Evangelismo, MiP-ES, ASA");

INSERT INTO contacto VALUE (null,1,1,1,"Adoniram",null,"Alomia",null,null,"F",null,"245","581011","adoniram.alomia@adventistas.org.bo",null);

INSERT INTO telefonoContacto VALUE (null,1,"Celular","722-37470");
=======
INSERT INTO cargo VALUE(null, "DOCENTE");
INSERT INTO cargo VALUE(null, "PROFESOR");
INSERT INTO cargo VALUE(null, "SECRETARIA");
INSERT INTO cargo VALUE(null, "JARDINERO");
INSERT INTO cargo VALUE(null, "CONTADOR");

INSERT INTO cargoPersona VALUE(null, "DOCENTE");
INSERT INTO cargoPersona VALUE(null, "RECTOR");
INSERT INTO cargoPersona VALUE(null, "DECANO");
INSERT INTO cargoPersona VALUE(null, "VICE-DECANO");
INSERT INTO cargoPersona VALUE(null, "SECRETARIO ACADEMICO");
INSERT INTO cargoPersona VALUE(null, "CAPELLAN");

INSERT INTO enfermedad VALUE(null, "RINTITIS");
INSERT INTO enfermedad VALUE(null, "ASMA");
INSERT INTO enfermedad VALUE(null, "URTICARIA");
INSERT INTO enfermedad VALUE(null, "DERMATITIS");

INSERT INTO deporte VALUE(null, "FUTBOL");
INSERT INTO deporte VALUE(null, "FUTBOL DE SALON");
INSERT INTO deporte VALUE(null, "VOLLEY");
INSERT INTO deporte VALUE(null, "BASQUET");
INSERT INTO deporte VALUE(null, "TENIS");
INSERT INTO deporte VALUE(null, "NATACION");
INSERT INTO deporte VALUE(null, "WALLY");
INSERT INTO deporte VALUE(null, "FRONTON");
INSERT INTO deporte VALUE(null, "AJEDREZ");
INSERT INTO deporte VALUE(null, "FISICOCULTURISMO");
INSERT INTO deporte VALUE(null, "RUGBY");
INSERT INTO deporte VALUE(null, "FUTBOL AMERICANO");

INSERT INTO tipoTituloProfesional VALUE(null, "LICENCIATURA");
INSERT INTO tipoTituloProfesional VALUE(null, "DIPLOMADO");
INSERT INTO tipoTituloProfesional VALUE(null, "MAESTRIA");
INSERT INTO tipoTituloProfesional VALUE(null, "DOCTORADO");
>>>>>>> f2ff51d8577b8eff956e0fc855c8b829c2e020e0
