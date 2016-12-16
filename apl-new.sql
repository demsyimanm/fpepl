--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.3
-- Dumped by pg_dump version 9.5.3

-- Started on 2016-09-25 18:28:34

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12355)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2340 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- TOC entry 2 (class 3079 OID 16665)
-- Name: pgcrypto; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS pgcrypto WITH SCHEMA public;


--
-- TOC entry 2341 (class 0 OID 0)
-- Dependencies: 2
-- Name: EXTENSION pgcrypto; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgcrypto IS 'cryptographic functions';


SET search_path = public, pg_catalog;

--
-- TOC entry 604 (class 1247 OID 16702)
-- Name: BOOLEAN; Type: DOMAIN; Schema: public; Owner: postgres
--

CREATE DOMAIN "BOOLEAN" AS numeric(1,0);


ALTER DOMAIN "BOOLEAN" OWNER TO postgres;

--
-- TOC entry 605 (class 1247 OID 16703)
-- Name: datetime; Type: DOMAIN; Schema: public; Owner: postgres
--

CREATE DOMAIN datetime AS date;


ALTER DOMAIN datetime OWNER TO postgres;

--
-- TOC entry 606 (class 1247 OID 16704)
-- Name: email; Type: DOMAIN; Schema: public; Owner: postgres
--

CREATE DOMAIN email AS character varying(100);


ALTER DOMAIN email OWNER TO postgres;

--
-- TOC entry 607 (class 1247 OID 16705)
-- Name: jenis_kelamin; Type: DOMAIN; Schema: public; Owner: postgres
--

CREATE DOMAIN jenis_kelamin AS character(1);


ALTER DOMAIN jenis_kelamin OWNER TO postgres;

--
-- TOC entry 608 (class 1247 OID 16706)
-- Name: nama_orang; Type: DOMAIN; Schema: public; Owner: postgres
--

CREATE DOMAIN nama_orang AS character varying(80);


ALTER DOMAIN nama_orang OWNER TO postgres;

--
-- TOC entry 609 (class 1247 OID 16707)
-- Name: nama_wilayah; Type: DOMAIN; Schema: public; Owner: postgres
--

CREATE DOMAIN nama_wilayah AS character varying(60);


ALTER DOMAIN nama_wilayah OWNER TO postgres;

--
-- TOC entry 610 (class 1247 OID 16708)
-- Name: tahun; Type: DOMAIN; Schema: public; Owner: postgres
--

CREATE DOMAIN tahun AS numeric(4,0);


ALTER DOMAIN tahun OWNER TO postgres;

--
-- TOC entry 611 (class 1247 OID 16709)
-- Name: tanggal; Type: DOMAIN; Schema: public; Owner: postgres
--

CREATE DOMAIN tanggal AS date;


ALTER DOMAIN tanggal OWNER TO postgres;

--
-- TOC entry 612 (class 1247 OID 16710)
-- Name: uuid; Type: DOMAIN; Schema: public; Owner: postgres
--

CREATE DOMAIN uuid AS pg_catalog.uuid;


ALTER DOMAIN uuid OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 182 (class 1259 OID 16711)
-- Name: access_right; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE access_right (
    id_access_right integer NOT NULL,
    id_menu pg_catalog.uuid NOT NULL,
    id_role integer NOT NULL,
    can_write "BOOLEAN" NOT NULL,
    can_delete "BOOLEAN" NOT NULL
);


ALTER TABLE access_right OWNER TO postgres;

--
-- TOC entry 183 (class 1259 OID 16717)
-- Name: ajuan_kp; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE ajuan_kp (
    id_ajuan_kp pg_catalog.uuid NOT NULL,
    id_ptk pg_catalog.uuid,
    id_pd pg_catalog.uuid,
    id_dudi pg_catalog.uuid NOT NULL,
    id_kel_pd pg_catalog.uuid,
    status character(1),
    tanggal_mulai date,
    tanggal_selesai date,
    tgl_ajuan character(15)
);


ALTER TABLE ajuan_kp OWNER TO postgres;

--
-- TOC entry 184 (class 1259 OID 16720)
-- Name: aktivitas_kerja_praktek; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE aktivitas_kerja_praktek (
    id_akt_kp pg_catalog.uuid NOT NULL,
    id_ajuan_kp pg_catalog.uuid NOT NULL,
    konten character(1000),
    tanggal date
);


ALTER TABLE aktivitas_kerja_praktek OWNER TO postgres;

--
-- TOC entry 185 (class 1259 OID 16723)
-- Name: anggota_kel_pd; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE anggota_kel_pd (
    id_kel_pd pg_catalog.uuid NOT NULL,
    id_pd1 pg_catalog.uuid NOT NULL,
    updated_at datetime,
    soft_delete "BOOLEAN" DEFAULT 0,
    id_pd2 pg_catalog.uuid,
    created_at character(15)
);


ALTER TABLE anggota_kel_pd OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 16730)
-- Name: dokumen; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE dokumen (
    id_dok pg_catalog.uuid NOT NULL,
    id_jns_dok integer NOT NULL,
    desk_dok character varying(200) NOT NULL,
    file_content character(1) NOT NULL,
    media_type character varying(250) NOT NULL,
    file_name character varying(250) NOT NULL,
    wkt_unggah character(10) NOT NULL
);


ALTER TABLE dokumen OWNER TO postgres;

--
-- TOC entry 187 (class 1259 OID 16736)
-- Name: dudi; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE dudi (
    id_dudi pg_catalog.uuid NOT NULL,
    nm_lemb character varying(80) NOT NULL,
    jl character varying(100) NOT NULL,
    pic nama_orang NOT NULL,
    jabatan_pic character varying(50),
    updated_at datetime,
    soft_delete "BOOLEAN" DEFAULT 0,
    profil text,
    telpon text,
    jenis text,
    createde_at date
);


ALTER TABLE dudi OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 16743)
-- Name: jenis_dokumen; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE jenis_dokumen (
    id_jns_dok integer NOT NULL,
    created_at datetime NOT NULL,
    updated_at datetime NOT NULL,
    expired_at datetime,
    nm_jns_dok character varying(50) NOT NULL
);


ALTER TABLE jenis_dokumen OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 16746)
-- Name: kelompok_pd; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE kelompok_pd (
    id_kel_pd pg_catalog.uuid NOT NULL,
    nm_kel character varying(50) NOT NULL
);


ALTER TABLE kelompok_pd OWNER TO postgres;

--
-- TOC entry 190 (class 1259 OID 16749)
-- Name: level_wilayah; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE level_wilayah (
    id_level_wil smallint NOT NULL,
    created_at datetime NOT NULL,
    updated_at datetime NOT NULL,
    expired_at datetime,
    nm_level_wilayah character varying(15)
);


ALTER TABLE level_wilayah OWNER TO postgres;

--
-- TOC entry 2342 (class 0 OID 0)
-- Dependencies: 190
-- Name: TABLE level_wilayah; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE level_wilayah IS 'Pembagian atau klasifikasi administratif wilayah dalam bentuk tingkatan.';


--
-- TOC entry 2343 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN level_wilayah.id_level_wil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN level_wilayah.id_level_wil IS 'Identitas unik level wilayah
Contoh nilai: angka integer dimulai dari 0';


--
-- TOC entry 2344 (class 0 OID 0)
-- Dependencies: 190
-- Name: COLUMN level_wilayah.nm_level_wilayah; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN level_wilayah.nm_level_wilayah IS 'Penamaan pembagian administratif wilayah
Contoh nilai: Provinsi, Kabupaten, Kota, Kecamatan, Kelurahan';


--
-- TOC entry 191 (class 1259 OID 16752)
-- Name: menu; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE menu (
    id_menu pg_catalog.uuid NOT NULL,
    name character varying(100),
    access_url character varying(500)
);


ALTER TABLE menu OWNER TO postgres;

--
-- TOC entry 192 (class 1259 OID 16758)
-- Name: negara; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE negara (
    id_negara character(2) NOT NULL,
    created_at datetime NOT NULL,
    updated_at datetime NOT NULL,
    expired_at datetime,
    nm_negara character varying(45) NOT NULL,
    a_ln "BOOLEAN" NOT NULL,
    benua numeric(1,0) DEFAULT 1 NOT NULL,
    CONSTRAINT ckc_benua_negara CHECK ((benua = ANY (ARRAY[(1)::numeric, (2)::numeric, (3)::numeric, (4)::numeric, (5)::numeric, (6)::numeric])))
);


ALTER TABLE negara OWNER TO postgres;

--
-- TOC entry 2345 (class 0 OID 0)
-- Dependencies: 192
-- Name: TABLE negara; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE negara IS 'Lingkup wilayah yang memiliki rakyat dan pemerintahannya sendiri';


--
-- TOC entry 2346 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN negara.id_negara; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN negara.id_negara IS 'Identitas unik negara
Format: dua huruf kapital berdasarkan ISO 3166-1 alpha-2
Contoh nilai: ID untuk Indonesia, AU untuk Australia, CA untuk Canada, dst.';


--
-- TOC entry 2347 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN negara.nm_negara; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN negara.nm_negara IS 'Nama resmi negara berdasarkan ISO-3166-1
Contoh nilai: Indonesia, Australia, Canada, dst.';


--
-- TOC entry 2348 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN negara.a_ln; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN negara.a_ln IS 'Keterangan apakah suatu negara selain negara Indonesia
Contoh nilai: 0 untuk negara Indonesia, 1 untuk negara selain Indonesia';


--
-- TOC entry 2349 (class 0 OID 0)
-- Dependencies: 192
-- Name: COLUMN negara.benua; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN negara.benua IS 'Benua dimana negara berada';


--
-- TOC entry 193 (class 1259 OID 16766)
-- Name: peserta_didik; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE peserta_didik (
    id pg_catalog.uuid NOT NULL,
    nm_pd nama_orang NOT NULL,
    jk jenis_kelamin NOT NULL,
    nrp character varying(25) NOT NULL,
    email email NOT NULL,
    no_hp character varying(16) NOT NULL,
    remember_token character(100),
    password text,
    tgl_lahir character(100)
);


ALTER TABLE peserta_didik OWNER TO postgres;

--
-- TOC entry 194 (class 1259 OID 16772)
-- Name: ptk; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE ptk (
    id_ptk pg_catalog.uuid NOT NULL,
    nm_ptk nama_orang NOT NULL,
    jk jenis_kelamin NOT NULL,
    tgl_lahir tanggal NOT NULL,
    nidn character(10),
    nip character varying(18),
    gelar_depan character varying(20),
    gelar_belakang character varying(30),
    email email,
    inisial character varying(3) NOT NULL,
    no_hp character varying(16) NOT NULL,
    created_at datetime NOT NULL,
    updated_at datetime NOT NULL,
    soft_delete "BOOLEAN" DEFAULT 0 NOT NULL
);


ALTER TABLE ptk OWNER TO postgres;

--
-- TOC entry 195 (class 1259 OID 16779)
-- Name: role; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE role (
    id_role integer NOT NULL,
    nm_role character varying(25) NOT NULL
);


ALTER TABLE role OWNER TO postgres;

--
-- TOC entry 196 (class 1259 OID 16782)
-- Name: semester; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE semester (
    id_smt character(5) NOT NULL,
    id_thn_ajar tahun NOT NULL,
    created_at datetime NOT NULL,
    updated_at datetime NOT NULL,
    expired_at datetime,
    nm_smt character varying(20) NOT NULL,
    smt numeric(2,0) NOT NULL,
    a_aktif "BOOLEAN" NOT NULL,
    tgl_mulai tanggal NOT NULL,
    tgl_selesai tanggal NOT NULL
);


ALTER TABLE semester OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 16788)
-- Name: tahun_ajaran; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE tahun_ajaran (
    id_thn_ajar tahun NOT NULL,
    created_at datetime NOT NULL,
    updated_at datetime NOT NULL,
    expired_at datetime,
    nm_thn_ajar character varying(10) NOT NULL,
    a_aktif "BOOLEAN" NOT NULL,
    tgl_mulai tanggal,
    tgl_selesai tanggal
);


ALTER TABLE tahun_ajaran OWNER TO postgres;

--
-- TOC entry 198 (class 1259 OID 16794)
-- Name: tetangga_kabkota; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE tetangga_kabkota (
    wil_id_wil character(8) NOT NULL,
    id_wil character(8) NOT NULL
);


ALTER TABLE tetangga_kabkota OWNER TO postgres;

--
-- TOC entry 2350 (class 0 OID 0)
-- Dependencies: 198
-- Name: TABLE tetangga_kabkota; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE tetangga_kabkota IS 'Kabupaten atau kota yang saling berbatasan langsung atau bertetangga.';


--
-- TOC entry 2351 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN tetangga_kabkota.wil_id_wil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN tetangga_kabkota.wil_id_wil IS 'Identitas unik wilayah
Format: <perlu diisi>
Contoh nilai: <perlu diisi>';


--
-- TOC entry 2352 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN tetangga_kabkota.id_wil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN tetangga_kabkota.id_wil IS 'Identitas unik wilayah
Format: <perlu diisi>
Contoh nilai: <perlu diisi>';


--
-- TOC entry 199 (class 1259 OID 16797)
-- Name: user; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE "user" (
    username email NOT NULL,
    id_pd pg_catalog.uuid,
    password character varying(64) NOT NULL,
    remember_token character varying(100)
);


ALTER TABLE "user" OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 16803)
-- Name: user_role; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE user_role (
    username email NOT NULL,
    id_role integer NOT NULL,
    is_active "BOOLEAN" NOT NULL
);


ALTER TABLE user_role OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16809)
-- Name: wilayah; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE wilayah (
    id_wil character(8) NOT NULL,
    id_level_wil smallint NOT NULL,
    wil_id_wil character(8),
    id_negara character(2) NOT NULL,
    created_at datetime NOT NULL,
    updated_at datetime NOT NULL,
    expired_at datetime,
    nm_wil nama_wilayah,
    asal_wil character(8),
    kode_bps character(7),
    kode_dagri character(7),
    kode_keu character varying(10)
);


ALTER TABLE wilayah OWNER TO postgres;

--
-- TOC entry 2353 (class 0 OID 0)
-- Dependencies: 201
-- Name: TABLE wilayah; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE wilayah IS 'Pembagian area di suatu negara berdasarkan pembagian wilayah administratif.';


--
-- TOC entry 2354 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN wilayah.id_wil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN wilayah.id_wil IS 'Identitas unik wilayah
Format: <perlu diisi>
Contoh nilai: <perlu diisi>';


--
-- TOC entry 2355 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN wilayah.id_level_wil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN wilayah.id_level_wil IS 'Identitas unik level wilayah
Contoh nilai: angka integer dimulai dari 0';


--
-- TOC entry 2356 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN wilayah.wil_id_wil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN wilayah.wil_id_wil IS 'Identitas unik wilayah
Format: <perlu diisi>
Contoh nilai: <perlu diisi>';


--
-- TOC entry 2357 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN wilayah.id_negara; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN wilayah.id_negara IS 'Identitas unik negara
Format: dua huruf kapital berdasarkan ISO 3166-1 alpha-2
Contoh nilai: ID untuk Indonesia, AU untuk Australia, CA untuk Canada, dst.';


--
-- TOC entry 2358 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN wilayah.nm_wil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN wilayah.nm_wil IS 'Nama wilayah beserta nama singkatan administratifnya
Format: 
- kelurahan (Kel.): Kel. Wonorejo 
- kecamatan (Kec.): Kec. Rungkut
- kabupaten (Kab.): Kab. Bandung
- kota: Kota Bandung
- provinsi (Prov.): Prov. Jawa Timur';


--
-- TOC entry 2359 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN wilayah.asal_wil; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN wilayah.asal_wil IS 'Kode wilayah asal pemekaran daerah';


--
-- TOC entry 2360 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN wilayah.kode_bps; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN wilayah.kode_bps IS 'Kode wilayah yang dikeluarkan oleh Badan Pusat Statistik';


--
-- TOC entry 2361 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN wilayah.kode_dagri; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN wilayah.kode_dagri IS 'Kode wilayah yang dikeluarkan oleh Kementerian Dalam Negeri';


--
-- TOC entry 2362 (class 0 OID 0)
-- Dependencies: 201
-- Name: COLUMN wilayah.kode_keu; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN wilayah.kode_keu IS 'Kode wilayah yang dikeluarkan oleh Kementerian Keuangan';


--
-- TOC entry 2313 (class 0 OID 16711)
-- Dependencies: 182
-- Data for Name: access_right; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2314 (class 0 OID 16717)
-- Dependencies: 183
-- Data for Name: ajuan_kp; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO ajuan_kp VALUES ('003dca90-2131-11e6-9b8b-d7de91d63c04', NULL, '78f8a3e0-2004-11e6-a476-d93fb3684881', 'af729c00-202f-11e6-b2a7-e11f0776fe87', '003dc560-2131-11e6-a88f-b9189472daa7', NULL, '2016-05-24', '2016-05-31', '16-05-23       ');
INSERT INTO ajuan_kp VALUES ('b24de5a0-2186-11e6-b1d8-ad04578fc804', NULL, '96682f00-2186-11e6-ae4e-272dd0f90599', 'af729c00-202f-11e6-b2a7-e11f0776fe87', 'b24de280-2186-11e6-951d-ed5835faa47b', NULL, '2016-05-24', '2016-05-25', '16-05-24       ');
INSERT INTO ajuan_kp VALUES ('19d7a490-21a8-11e6-8634-b7032fc206a3', NULL, '41425b70-218d-11e6-93fa-97dab66fe58f', 'd2945060-2030-11e6-86f3-53f29552d749', '19d7a210-21a8-11e6-a117-4f86c8b5f0ae', NULL, '1995-12-10', '1995-11-10', '16-05-24       ');
INSERT INTO ajuan_kp VALUES ('a120f740-21c3-11e6-9522-9928bba5a22a', NULL, '5c5e5460-21c3-11e6-822a-456a16345636', '0df0e510-21b1-11e6-8bcb-dbb88b4ad03a', 'a120f4e0-21c3-11e6-a775-273bd864b3b7', NULL, '1995-12-10', '1995-10-06', '16-05-24       ');
INSERT INTO ajuan_kp VALUES ('47c564e0-2228-11e6-8499-c979bda0d27a', NULL, '03074da0-2228-11e6-a4d2-151d9a219e61', 'c4db44d0-2186-11e6-a08b-334de55b6b05', '47c56290-2228-11e6-b802-77dc69a0de8e', NULL, '1995-12-10', '1995-10-06', '16-05-25       ');
INSERT INTO ajuan_kp VALUES ('921716d0-7953-11e6-9085-4b10799efbf0', NULL, 'c06accd0-7952-11e6-8b25-57513014a50b', 'd2945060-2030-11e6-86f3-53f29552d749', '92170ff0-7953-11e6-9874-5b775b49c463', NULL, '1995-12-10', '1995-10-06', '16-09-13       ');


--
-- TOC entry 2315 (class 0 OID 16720)
-- Dependencies: 184
-- Data for Name: aktivitas_kerja_praktek; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO aktivitas_kerja_praktek VALUES ('ea1aa920-21c2-11e6-92a2-23835a990c41', '19d7a490-21a8-11e6-8634-b7032fc206a3', '>ggwp                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ', NULL);
INSERT INTO aktivitas_kerja_praktek VALUES ('f806b5b0-21c2-11e6-a527-93ea3e4e0125', '19d7a490-21a8-11e6-8634-b7032fc206a3', '>goodgamewellplayed                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ', NULL);
INSERT INTO aktivitas_kerja_praktek VALUES ('62d0fc30-21c3-11e6-93ba-ffd664b4f62c', '19d7a490-21a8-11e6-8634-b7032fc206a3', '>goodgamewellplayed                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ', NULL);
INSERT INTO aktivitas_kerja_praktek VALUES ('a5c90cd0-21c3-11e6-818f-fb530a331412', '19d7a490-21a8-11e6-8634-b7032fc206a3', '>goodgamewellplayed                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ', NULL);
INSERT INTO aktivitas_kerja_praktek VALUES ('ab89c080-21c3-11e6-af51-ff7060633baa', '19d7a490-21a8-11e6-8634-b7032fc206a3', '>goodgamewellplayed                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ', NULL);
INSERT INTO aktivitas_kerja_praktek VALUES ('f880d4d0-21c3-11e6-920f-b37e1b22f2c3', 'a120f740-21c3-11e6-9522-9928bba5a22a', '>goodgamewellplayed                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ', '2016-05-05');
INSERT INTO aktivitas_kerja_praktek VALUES ('755b2bd0-21c4-11e6-9e4a-250bdf1e9c8c', 'a120f740-21c3-11e6-9522-9928bba5a22a', '>ggwp                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ', '2016-07-05');
INSERT INTO aktivitas_kerja_praktek VALUES ('41e8d8c0-21c7-11e6-9d11-b34ff84b6aae', '19d7a490-21a8-11e6-8634-b7032fc206a3', 'asd1q                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ', '2016-05-02');
INSERT INTO aktivitas_kerja_praktek VALUES ('90965b20-21ce-11e6-b8a6-1b240726a8a5', '19d7a490-21a8-11e6-8634-b7032fc206a3', 'ggwp                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ', '2016-05-11');
INSERT INTO aktivitas_kerja_praktek VALUES ('13e13be0-21cf-11e6-b529-6b6e81e44a84', '19d7a490-21a8-11e6-8634-b7032fc206a3', 'we                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      ', '2016-04-25');
INSERT INTO aktivitas_kerja_praktek VALUES ('75928a30-21cf-11e6-8995-e58953016bca', '19d7a490-21a8-11e6-8634-b7032fc206a3', '123                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ', '2016-05-04');
INSERT INTO aktivitas_kerja_praktek VALUES ('158a11c0-21d0-11e6-a513-072f46d997eb', '19d7a490-21a8-11e6-8634-b7032fc206a3', 'ggewz                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   ', '2016-05-04');
INSERT INTO aktivitas_kerja_praktek VALUES ('db165c90-21d0-11e6-9209-671e997e8ace', '19d7a490-21a8-11e6-8634-b7032fc206a3', 'gfg                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ', '2016-05-18');
INSERT INTO aktivitas_kerja_praktek VALUES ('9aabcc90-2225-11e6-9120-63fd35df070e', '19d7a490-21a8-11e6-8634-b7032fc206a3', 'duh capeknya                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ', '2016-05-18');
INSERT INTO aktivitas_kerja_praktek VALUES ('b6a964e0-2225-11e6-8ecf-4b1119fa61aa', '19d7a490-21a8-11e6-8634-b7032fc206a3', 'baru sampai                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             ', '2016-05-04');
INSERT INTO aktivitas_kerja_praktek VALUES ('283d44c0-2226-11e6-9934-1ff52d5af0fa', '19d7a490-21a8-11e6-8634-b7032fc206a3', 'saw                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ', '2016-05-12');
INSERT INTO aktivitas_kerja_praktek VALUES ('5312b880-2228-11e6-8935-67553ce83f50', '47c564e0-2228-11e6-8499-c979bda0d27a', 'i love you                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              ', '2016-05-11');
INSERT INTO aktivitas_kerja_praktek VALUES ('a42fbb20-7953-11e6-a839-2bd7a0496a64', '921716d0-7953-11e6-9085-4b10799efbf0', 'nice                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ', '2016-09-21');
INSERT INTO aktivitas_kerja_praktek VALUES ('37b21260-7971-11e6-9451-71a1097ebd30', '921716d0-7953-11e6-9085-4b10799efbf0', 'test1
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 ', '2016-09-06');
INSERT INTO aktivitas_kerja_praktek VALUES ('547e2650-7978-11e6-8c33-37c682dcc995', '921716d0-7953-11e6-9085-4b10799efbf0', 'hari ini                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ', '2016-09-27');


--
-- TOC entry 2316 (class 0 OID 16723)
-- Dependencies: 185
-- Data for Name: anggota_kel_pd; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO anggota_kel_pd VALUES ('003dc560-2131-11e6-a88f-b9189472daa7', '78f8a3e0-2004-11e6-a476-d93fb3684881', NULL, 0, '7ea16f30-2005-11e6-bba9-412a707367f7', '16-05-23       ');
INSERT INTO anggota_kel_pd VALUES ('b24de280-2186-11e6-951d-ed5835faa47b', '96682f00-2186-11e6-ae4e-272dd0f90599', NULL, 0, '7ea16f30-2005-11e6-bba9-412a707367f7', '16-05-24       ');
INSERT INTO anggota_kel_pd VALUES ('19d7a210-21a8-11e6-a117-4f86c8b5f0ae', '41425b70-218d-11e6-93fa-97dab66fe58f', NULL, 0, '7ea16f30-2005-11e6-bba9-412a707367f7', '16-05-24       ');
INSERT INTO anggota_kel_pd VALUES ('784ca000-21c3-11e6-aa8c-dd46d2a3a097', '5c5e5460-21c3-11e6-822a-456a16345636', NULL, 0, '96682f00-2186-11e6-ae4e-272dd0f90599', '16-05-24       ');
INSERT INTO anggota_kel_pd VALUES ('a120f4e0-21c3-11e6-a775-273bd864b3b7', '5c5e5460-21c3-11e6-822a-456a16345636', NULL, 0, '96682f00-2186-11e6-ae4e-272dd0f90599', '16-05-24       ');
INSERT INTO anggota_kel_pd VALUES ('47c56290-2228-11e6-b802-77dc69a0de8e', '03074da0-2228-11e6-a4d2-151d9a219e61', NULL, 0, '78f8a3e0-2004-11e6-a476-d93fb3684881', '16-05-25       ');
INSERT INTO anggota_kel_pd VALUES ('92170ff0-7953-11e6-9874-5b775b49c463', 'c06accd0-7952-11e6-8b25-57513014a50b', NULL, 0, '03074da0-2228-11e6-a4d2-151d9a219e61', '16-09-13       ');


--
-- TOC entry 2317 (class 0 OID 16730)
-- Dependencies: 186
-- Data for Name: dokumen; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2318 (class 0 OID 16736)
-- Dependencies: 187
-- Data for Name: dudi; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO dudi VALUES ('af729c00-202f-11e6-b2a7-e11f0776fe87', 'Telkom indonesia', 'ketintang surabaya', 'Anwar Rosyidi', 'Manager IT development', NULL, 0, 'sss', '085695661969', 'It', NULL);
INSERT INTO dudi VALUES ('d2945060-2030-11e6-86f3-53f29552d749', 'konami', 'jepang', 'Anwar Rosyidi', 'Manager IT development', NULL, 0, 'aa', '085695661969', 'It', NULL);
INSERT INTO dudi VALUES ('c4db44d0-2186-11e6-a08b-334de55b6b05', 'Pt anwar maju sejahtera', 'bekasi', 'Anwar', 'Dirut', NULL, 0, 'luar biasa', '669666', 'jual beli ikan', NULL);
INSERT INTO dudi VALUES ('0df0e510-21b1-11e6-8bcb-dbb88b4ad03a', 'PT agung juga agak maju', 'surabaya', 'agung', 'teman', NULL, 0, 'lorem ipsum desu ga
', '08121212', 'ternak', NULL);


--
-- TOC entry 2319 (class 0 OID 16743)
-- Dependencies: 188
-- Data for Name: jenis_dokumen; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2320 (class 0 OID 16746)
-- Dependencies: 189
-- Data for Name: kelompok_pd; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO kelompok_pd VALUES ('003dc560-2131-11e6-a88f-b9189472daa7', 'lancar jaya');
INSERT INTO kelompok_pd VALUES ('b24de280-2186-11e6-951d-ed5835faa47b', 'mau bersama');
INSERT INTO kelompok_pd VALUES ('19d7a210-21a8-11e6-a117-4f86c8b5f0ae', 'petir');
INSERT INTO kelompok_pd VALUES ('a120f4e0-21c3-11e6-a775-273bd864b3b7', 'gentar');
INSERT INTO kelompok_pd VALUES ('47c56290-2228-11e6-b802-77dc69a0de8e', 'nidaunyu');
INSERT INTO kelompok_pd VALUES ('92170ff0-7953-11e6-9874-5b775b49c463', 'a');


--
-- TOC entry 2321 (class 0 OID 16749)
-- Dependencies: 190
-- Data for Name: level_wilayah; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2322 (class 0 OID 16752)
-- Dependencies: 191
-- Data for Name: menu; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2323 (class 0 OID 16758)
-- Dependencies: 192
-- Data for Name: negara; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2324 (class 0 OID 16766)
-- Dependencies: 193
-- Data for Name: peserta_didik; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO peserta_didik VALUES ('7ea16f30-2005-11e6-bba9-412a707367f7', 'Ridho Perdana', 'L', '5113100164', 'anwar@gmail.com', '888888', NULL, '$2y$10$1KXOaiPREry2iLkzse41M.MpKCxLNCwgpXjXbYLsiaFg9PyHZxfI.', NULL);
INSERT INTO peserta_didik VALUES ('78f8a3e0-2004-11e6-a476-d93fb3684881', 'Anwar rosyidi', 'L', '5113100180', 'anwarrosyidi.5@gmail.com', '085695661969', 'eL381RldoA5l0biwFyxD8FQsv6j40aWSk5tLHlIcKNLCosVSbVKJOuo9G1J2                                        ', '$2y$10$PlZoHAoihFG/9dy4QQ/7aeWxzD.QQecSFKUQ0W1VDYk1vPJIYMMf.', NULL);
INSERT INTO peserta_didik VALUES ('377111e0-20b0-11e6-a463-1fc1f2651ff8', 'xxx', 'L', '5113100120', 'anwarrosyidi.5@gmail.com', '085695661969', 'hqWt9gkD7kUSvCJi7a5bfCVMLUD51ou5aN8enxl5F5ci6biLlwz6PTuIZc0u                                        ', '$2y$10$PXnMCwjOhT8.0ZPdeoQ4se.ZuYUSU./NUELVHEbKvxtVYK1SJVi5m', NULL);
INSERT INTO peserta_didik VALUES ('96682f00-2186-11e6-ae4e-272dd0f90599', 'hahaha', 'P', '5114100126', 'anwarrosyidi.5@gmail.com', '08565959595', '0L9SqpFXdGY56F6vVSHj5ABBbVNsUYyCRo9gKXRgNVSoXqiaQ1mPgv0rrI5A                                        ', '$2y$10$Lgt8xud9ZAERXT..D8V5xec5xo9kBldekxVPh10l3egjRW5R.eCZS', NULL);
INSERT INTO peserta_didik VALUES ('5d652c60-21bd-11e6-8491-eb4548643a4f', 'agung', 'L', '123', 'asd@yahoo.com', '123', NULL, '$2y$10$yHrbRS9Kd.qYH97LITGDLO05ZH5F63nJ0G1F1ew21KAoxeHIm4HPy', '                                                                                                    ');
INSERT INTO peserta_didik VALUES ('5c5e5460-21c3-11e6-822a-456a16345636', 'agung', 'L', '321', 'asd@yahoo.com', '123', 'UZZCzownoSejT0E1alUpOOYIwxivtHxicxXsaqWY2ces5EoV7vHVDpmaj4TY                                        ', '$2y$10$cPdEoDEs.kfIGvK0Vldvd.j9EDzZEqCa57QjLsO.X8RRQUQvnaw6q', 'asd                                                                                                 ');
INSERT INTO peserta_didik VALUES ('03074da0-2228-11e6-a4d2-151d9a219e61', 'Nida amalia', 'P', '5113100100', 'nidaunyu@mail.com', '545454', 'VkFkHu4O1S3bkozUQKXPUX4UUyG7aiWVjNBqzTfbWWUu4hY1bq61wbMBGeo3                                        ', '$2y$10$.8cbTmk9P7/1BOpSG6Dbs.bedgQtXvIefcDX.foMvh9MqCpz.wY6i', '26/10/1996                                                                                          ');
INSERT INTO peserta_didik VALUES ('41425b70-218d-11e6-93fa-97dab66fe58f', 'agungsa', 'L', '5113100107', 'igdeagung@yahoo.co.id', '123', '3aXrMIoKd8Cn8MTTp7sw4qjSlS7j8EWOAdhQLBzAGpZqB4zTydMoqqWJgH3o                                        ', '$2y$10$4d/j8CFrTQITDN5SlJIGseMc3.zGd6kF5FLb9uem0A7.lVTjYB6ZS', '26-10-1996                                                                                          ');
INSERT INTO peserta_didik VALUES ('c06accd0-7952-11e6-8b25-57513014a50b', 'agung', 'L', '5113', 'sigdeagung@yahoo.co.id', '08123123123', 'RrhJMsAkYVHWvpBaJAXVejX78mJhin4oRJmp32R6opA2CFo8lnNjBqCwxEC5                                        ', '$2y$10$T95Hoxa0COoJ/CM6RcYmUure3wLceI2iDHbq1mH.LJEHhPVnRy8Ye', '26/10/1996                                                                                          ');


--
-- TOC entry 2325 (class 0 OID 16772)
-- Dependencies: 194
-- Data for Name: ptk; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2326 (class 0 OID 16779)
-- Dependencies: 195
-- Data for Name: role; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2327 (class 0 OID 16782)
-- Dependencies: 196
-- Data for Name: semester; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2328 (class 0 OID 16788)
-- Dependencies: 197
-- Data for Name: tahun_ajaran; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2329 (class 0 OID 16794)
-- Dependencies: 198
-- Data for Name: tetangga_kabkota; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2330 (class 0 OID 16797)
-- Dependencies: 199
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2331 (class 0 OID 16803)
-- Dependencies: 200
-- Data for Name: user_role; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2332 (class 0 OID 16809)
-- Dependencies: 201
-- Data for Name: wilayah; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 2123 (class 2606 OID 16816)
-- Name: pk_access_right; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY access_right
    ADD CONSTRAINT pk_access_right PRIMARY KEY (id_access_right);


--
-- TOC entry 2131 (class 2606 OID 16818)
-- Name: pk_ajuan_kp; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ajuan_kp
    ADD CONSTRAINT pk_ajuan_kp PRIMARY KEY (id_ajuan_kp);


--
-- TOC entry 2135 (class 2606 OID 16820)
-- Name: pk_aktivitas_kerja_praktek; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY aktivitas_kerja_praktek
    ADD CONSTRAINT pk_aktivitas_kerja_praktek PRIMARY KEY (id_akt_kp);


--
-- TOC entry 2140 (class 2606 OID 16822)
-- Name: pk_anggota_kel_pd; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY anggota_kel_pd
    ADD CONSTRAINT pk_anggota_kel_pd PRIMARY KEY (id_kel_pd, id_pd1);


--
-- TOC entry 2144 (class 2606 OID 16824)
-- Name: pk_dokumen; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY dokumen
    ADD CONSTRAINT pk_dokumen PRIMARY KEY (id_dok);


--
-- TOC entry 2147 (class 2606 OID 16826)
-- Name: pk_dudi; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY dudi
    ADD CONSTRAINT pk_dudi PRIMARY KEY (id_dudi);


--
-- TOC entry 2150 (class 2606 OID 16828)
-- Name: pk_jenis_dokumen; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY jenis_dokumen
    ADD CONSTRAINT pk_jenis_dokumen PRIMARY KEY (id_jns_dok);


--
-- TOC entry 2153 (class 2606 OID 16830)
-- Name: pk_kelompok_pd; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY kelompok_pd
    ADD CONSTRAINT pk_kelompok_pd PRIMARY KEY (id_kel_pd);


--
-- TOC entry 2156 (class 2606 OID 16832)
-- Name: pk_level_wilayah; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY level_wilayah
    ADD CONSTRAINT pk_level_wilayah PRIMARY KEY (id_level_wil);


--
-- TOC entry 2159 (class 2606 OID 16834)
-- Name: pk_menu; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY menu
    ADD CONSTRAINT pk_menu PRIMARY KEY (id_menu);


--
-- TOC entry 2162 (class 2606 OID 16836)
-- Name: pk_negara; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY negara
    ADD CONSTRAINT pk_negara PRIMARY KEY (id_negara);


--
-- TOC entry 2165 (class 2606 OID 16838)
-- Name: pk_peserta_didik; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY peserta_didik
    ADD CONSTRAINT pk_peserta_didik PRIMARY KEY (id);


--
-- TOC entry 2167 (class 2606 OID 16840)
-- Name: pk_ptk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ptk
    ADD CONSTRAINT pk_ptk PRIMARY KEY (id_ptk);


--
-- TOC entry 2170 (class 2606 OID 16842)
-- Name: pk_role; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY role
    ADD CONSTRAINT pk_role PRIMARY KEY (id_role);


--
-- TOC entry 2173 (class 2606 OID 16844)
-- Name: pk_semester; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY semester
    ADD CONSTRAINT pk_semester PRIMARY KEY (id_smt);


--
-- TOC entry 2177 (class 2606 OID 16846)
-- Name: pk_tahun_ajaran; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tahun_ajaran
    ADD CONSTRAINT pk_tahun_ajaran PRIMARY KEY (id_thn_ajar);


--
-- TOC entry 2182 (class 2606 OID 16848)
-- Name: pk_tetangga_kabkota; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY tetangga_kabkota
    ADD CONSTRAINT pk_tetangga_kabkota PRIMARY KEY (wil_id_wil, id_wil);


--
-- TOC entry 2186 (class 2606 OID 16850)
-- Name: pk_user; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY "user"
    ADD CONSTRAINT pk_user PRIMARY KEY (username);


--
-- TOC entry 2189 (class 2606 OID 16852)
-- Name: pk_user_role; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY user_role
    ADD CONSTRAINT pk_user_role PRIMARY KEY (username, id_role);


--
-- TOC entry 2196 (class 2606 OID 16854)
-- Name: pk_wilayah; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY wilayah
    ADD CONSTRAINT pk_wilayah PRIMARY KEY (id_wil);


--
-- TOC entry 2120 (class 1259 OID 16855)
-- Name: access_right_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX access_right_pk ON access_right USING btree (id_access_right);


--
-- TOC entry 2125 (class 1259 OID 16856)
-- Name: ajuan_kp_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX ajuan_kp_pk ON ajuan_kp USING btree (id_ajuan_kp);


--
-- TOC entry 2132 (class 1259 OID 16857)
-- Name: aktivitas_kerja_praktek_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX aktivitas_kerja_praktek_pk ON aktivitas_kerja_praktek USING btree (id_akt_kp);


--
-- TOC entry 2136 (class 1259 OID 16858)
-- Name: anggota_kel_pd_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX anggota_kel_pd_pk ON anggota_kel_pd USING btree (id_kel_pd, id_pd1);


--
-- TOC entry 2137 (class 1259 OID 16859)
-- Name: anggota_kelompok_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX anggota_kelompok_fk ON anggota_kel_pd USING btree (id_kel_pd);


--
-- TOC entry 2141 (class 1259 OID 16860)
-- Name: dokumen_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX dokumen_pk ON dokumen USING btree (id_dok);


--
-- TOC entry 2145 (class 1259 OID 16861)
-- Name: dudi_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX dudi_pk ON dudi USING btree (id_dudi);


--
-- TOC entry 2193 (class 1259 OID 16862)
-- Name: induk_wilayah_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX induk_wilayah_fk ON wilayah USING btree (wil_id_wil);


--
-- TOC entry 2142 (class 1259 OID 16863)
-- Name: jenis_dokumen_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX jenis_dokumen_fk ON dokumen USING btree (id_jns_dok);


--
-- TOC entry 2148 (class 1259 OID 16864)
-- Name: jenis_dokumen_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX jenis_dokumen_pk ON jenis_dokumen USING btree (id_jns_dok);


--
-- TOC entry 2179 (class 1259 OID 16865)
-- Name: kabkota_1_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX kabkota_1_fk ON tetangga_kabkota USING btree (wil_id_wil);


--
-- TOC entry 2180 (class 1259 OID 16866)
-- Name: kabkota_2_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX kabkota_2_fk ON tetangga_kabkota USING btree (id_wil);


--
-- TOC entry 2126 (class 1259 OID 16867)
-- Name: kel_pengaju_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX kel_pengaju_fk ON ajuan_kp USING btree (id_kel_pd);


--
-- TOC entry 2151 (class 1259 OID 16868)
-- Name: kelompok_pd_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX kelompok_pd_pk ON kelompok_pd USING btree (id_kel_pd);


--
-- TOC entry 2133 (class 1259 OID 16869)
-- Name: kp_aktivitas_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX kp_aktivitas_fk ON aktivitas_kerja_praktek USING btree (id_ajuan_kp);


--
-- TOC entry 2127 (class 1259 OID 16870)
-- Name: kp_dudi_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX kp_dudi_fk ON ajuan_kp USING btree (id_dudi);


--
-- TOC entry 2194 (class 1259 OID 16871)
-- Name: level_wilayah_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX level_wilayah_fk ON wilayah USING btree (id_level_wil);


--
-- TOC entry 2154 (class 1259 OID 16872)
-- Name: level_wilayah_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX level_wilayah_pk ON level_wilayah USING btree (id_level_wil);


--
-- TOC entry 2121 (class 1259 OID 16873)
-- Name: menu_access_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX menu_access_fk ON access_right USING btree (id_menu);


--
-- TOC entry 2157 (class 1259 OID 16874)
-- Name: menu_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX menu_pk ON menu USING btree (id_menu);


--
-- TOC entry 2160 (class 1259 OID 16875)
-- Name: negara_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX negara_pk ON negara USING btree (id_negara);


--
-- TOC entry 2138 (class 1259 OID 16876)
-- Name: pd_kelompok_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX pd_kelompok_fk ON anggota_kel_pd USING btree (id_pd1);


--
-- TOC entry 2128 (class 1259 OID 16877)
-- Name: pd_pengaju_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX pd_pengaju_fk ON ajuan_kp USING btree (id_pd);


--
-- TOC entry 2184 (class 1259 OID 16878)
-- Name: pd_user_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX pd_user_fk ON "user" USING btree (id_pd);


--
-- TOC entry 2129 (class 1259 OID 16879)
-- Name: pembimbing_kp_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX pembimbing_kp_fk ON ajuan_kp USING btree (id_ptk);


--
-- TOC entry 2163 (class 1259 OID 16880)
-- Name: peserta_didik_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX peserta_didik_pk ON peserta_didik USING btree (id);


--
-- TOC entry 2197 (class 1259 OID 16881)
-- Name: propinsi_negara_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX propinsi_negara_fk ON wilayah USING btree (id_negara);


--
-- TOC entry 2168 (class 1259 OID 16882)
-- Name: ptk_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX ptk_pk ON ptk USING btree (id_ptk);


--
-- TOC entry 2124 (class 1259 OID 16883)
-- Name: role_access_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX role_access_fk ON access_right USING btree (id_role);


--
-- TOC entry 2171 (class 1259 OID 16884)
-- Name: role_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX role_pk ON role USING btree (id_role);


--
-- TOC entry 2190 (class 1259 OID 16885)
-- Name: role_user_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX role_user_fk ON user_role USING btree (id_role);


--
-- TOC entry 2174 (class 1259 OID 16886)
-- Name: semester_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX semester_pk ON semester USING btree (id_smt);


--
-- TOC entry 2175 (class 1259 OID 16887)
-- Name: smt_thn_ajar_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX smt_thn_ajar_fk ON semester USING btree (id_thn_ajar);


--
-- TOC entry 2178 (class 1259 OID 16888)
-- Name: tahun_ajaran_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX tahun_ajaran_pk ON tahun_ajaran USING btree (id_thn_ajar);


--
-- TOC entry 2183 (class 1259 OID 16889)
-- Name: tetangga_kabkota_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX tetangga_kabkota_pk ON tetangga_kabkota USING btree (wil_id_wil, id_wil);


--
-- TOC entry 2187 (class 1259 OID 16890)
-- Name: user_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX user_pk ON "user" USING btree (username);


--
-- TOC entry 2191 (class 1259 OID 16891)
-- Name: user_role_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX user_role_fk ON user_role USING btree (username);


--
-- TOC entry 2192 (class 1259 OID 16892)
-- Name: user_role_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX user_role_pk ON user_role USING btree (username, id_role);


--
-- TOC entry 2198 (class 1259 OID 16893)
-- Name: wilayah_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX wilayah_pk ON wilayah USING btree (id_wil);


--
-- TOC entry 2339 (class 0 OID 0)
-- Dependencies: 7
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-09-25 18:28:35

--
-- PostgreSQL database dump complete
--

