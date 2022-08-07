--
-- PostgreSQL database dump
--

-- Dumped from database version 12.4
-- Dumped by pg_dump version 12.4

-- Started on 2022-08-08 03:09:20

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 208 (class 1259 OID 65454)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 65452)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

--
-- TOC entry 2897 (class 0 OID 0)
-- Dependencies: 207
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 214 (class 1259 OID 65498)
-- Name: learn_activities; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.learn_activities (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    method_id bigint NOT NULL,
    start_date date NOT NULL,
    end_date date NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.learn_activities OWNER TO postgres;

--
-- TOC entry 213 (class 1259 OID 65496)
-- Name: learn_activities_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.learn_activities_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.learn_activities_id_seq OWNER TO postgres;

--
-- TOC entry 2898 (class 0 OID 0)
-- Dependencies: 213
-- Name: learn_activities_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.learn_activities_id_seq OWNED BY public.learn_activities.id;


--
-- TOC entry 212 (class 1259 OID 65490)
-- Name: learn_activity_methods; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.learn_activity_methods (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.learn_activity_methods OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 65488)
-- Name: learn_activity_methods_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.learn_activity_methods_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.learn_activity_methods_id_seq OWNER TO postgres;

--
-- TOC entry 2899 (class 0 OID 0)
-- Dependencies: 211
-- Name: learn_activity_methods_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.learn_activity_methods_id_seq OWNED BY public.learn_activity_methods.id;


--
-- TOC entry 203 (class 1259 OID 65426)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 65424)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 2900 (class 0 OID 0)
-- Dependencies: 202
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 206 (class 1259 OID 65445)
-- Name: password_resets; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_resets OWNER TO postgres;

--
-- TOC entry 210 (class 1259 OID 65468)
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 65466)
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_access_tokens_id_seq OWNER TO postgres;

--
-- TOC entry 2901 (class 0 OID 0)
-- Dependencies: 209
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- TOC entry 205 (class 1259 OID 65434)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 65432)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 2902 (class 0 OID 0)
-- Dependencies: 204
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 2727 (class 2604 OID 65457)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 2731 (class 2604 OID 65501)
-- Name: learn_activities id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.learn_activities ALTER COLUMN id SET DEFAULT nextval('public.learn_activities_id_seq'::regclass);


--
-- TOC entry 2730 (class 2604 OID 65493)
-- Name: learn_activity_methods id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.learn_activity_methods ALTER COLUMN id SET DEFAULT nextval('public.learn_activity_methods_id_seq'::regclass);


--
-- TOC entry 2725 (class 2604 OID 65429)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 2729 (class 2604 OID 65471)
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- TOC entry 2726 (class 2604 OID 65437)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 2885 (class 0 OID 65454)
-- Dependencies: 208
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- TOC entry 2891 (class 0 OID 65498)
-- Dependencies: 214
-- Data for Name: learn_activities; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.learn_activities (id, name, method_id, start_date, end_date, deleted_at, created_at, updated_at) FROM stdin;
8	aditaahmad@gmail.com334666	1	2022-01-01	2022-01-01	2022-08-07 15:12:09	2022-08-06 12:49:35	2022-08-07 15:12:09
10	Adita Ahmadfffffdddd	1	2022-01-04	2022-01-20	2022-08-07 16:54:01	2022-08-07 16:50:44	2022-08-07 16:54:01
9	new tested activity	1	2022-02-02	2022-02-09	2022-08-07 16:55:58	2022-08-07 06:41:30	2022-08-07 16:55:58
7	I Phone 7s blued	6	2022-02-01	2022-02-09	2022-08-07 17:49:58	2022-08-06 08:17:28	2022-08-07 17:49:58
6	I Phone 7s	4	2022-01-07	2022-01-07	2022-08-07 17:51:27	2022-08-06 07:33:40	2022-08-07 17:51:27
5	aditaahmad	2	2022-03-09	2022-03-10	2022-08-07 17:51:37	2022-08-06 07:30:40	2022-08-07 17:51:37
12	Adita Ahmad	1	2022-01-06	2022-01-19	2022-08-07 19:52:45	2022-08-07 19:20:43	2022-08-07 19:52:45
3	aditaahmad	2	2022-02-06	2022-02-07	2022-08-07 19:52:54	2022-08-06 07:28:53	2022-08-07 19:52:54
11	Adita fffffe	1	2022-01-03	2022-01-12	2022-08-07 20:07:17	2022-08-07 17:59:07	2022-08-07 20:07:17
4	aditaahmad	2	2022-03-07	2022-03-08	2022-08-07 20:07:22	2022-08-06 07:29:18	2022-08-07 20:07:22
1	aditaahmad	1	2022-05-04	2022-05-12	2022-08-07 20:07:26	2022-08-06 07:03:42	2022-08-07 20:07:26
2	Adita Ahmad	3	2022-01-06	2022-01-07	2022-08-07 20:07:31	2022-08-06 07:24:06	2022-08-07 20:07:31
13	new	5	2022-02-08	2022-02-11	2022-08-07 20:07:37	2022-08-07 19:45:53	2022-08-07 20:07:37
\.


--
-- TOC entry 2889 (class 0 OID 65490)
-- Dependencies: 212
-- Data for Name: learn_activity_methods; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.learn_activity_methods (id, name, deleted_at, created_at, updated_at) FROM stdin;
1	Workshop/ Self Learning	\N	2022-08-05 14:10:13	2022-08-05 14:10:13
2	Sharing Practice/ Profesional's Talk	\N	2022-08-05 14:10:13	2022-08-05 14:10:13
3	Discussion Room	\N	2022-08-05 14:10:13	2022-08-05 14:10:13
4	Coaching	\N	2022-08-05 14:10:13	2022-08-05 14:10:13
5	Mentoring	\N	2022-08-05 14:10:13	2022-08-05 14:10:13
6	Job Assignment	\N	2022-08-05 14:10:13	2022-08-05 14:10:13
\.


--
-- TOC entry 2880 (class 0 OID 65426)
-- Dependencies: 203
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	2014_10_12_000000_create_users_table	1
2	2014_10_12_100000_create_password_resets_table	1
3	2019_08_19_000000_create_failed_jobs_table	1
4	2019_12_14_000001_create_personal_access_tokens_table	1
5	2022_08_05_080012_create_learn_activity_methods_table	2
6	2022_08_05_080107_create_learn_activities_table	2
\.


--
-- TOC entry 2883 (class 0 OID 65445)
-- Dependencies: 206
-- Data for Name: password_resets; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_resets (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 2887 (class 0 OID 65468)
-- Dependencies: 210
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 2882 (class 0 OID 65434)
-- Dependencies: 205
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
\.


--
-- TOC entry 2903 (class 0 OID 0)
-- Dependencies: 207
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 2904 (class 0 OID 0)
-- Dependencies: 213
-- Name: learn_activities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.learn_activities_id_seq', 13, true);


--
-- TOC entry 2905 (class 0 OID 0)
-- Dependencies: 211
-- Name: learn_activity_methods_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.learn_activity_methods_id_seq', 6, true);


--
-- TOC entry 2906 (class 0 OID 0)
-- Dependencies: 202
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 6, true);


--
-- TOC entry 2907 (class 0 OID 0)
-- Dependencies: 209
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- TOC entry 2908 (class 0 OID 0)
-- Dependencies: 204
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 1, false);


--
-- TOC entry 2740 (class 2606 OID 65463)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 2742 (class 2606 OID 65465)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 2751 (class 2606 OID 65503)
-- Name: learn_activities learn_activities_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.learn_activities
    ADD CONSTRAINT learn_activities_pkey PRIMARY KEY (id);


--
-- TOC entry 2749 (class 2606 OID 65495)
-- Name: learn_activity_methods learn_activity_methods_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.learn_activity_methods
    ADD CONSTRAINT learn_activity_methods_pkey PRIMARY KEY (id);


--
-- TOC entry 2733 (class 2606 OID 65431)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 2744 (class 2606 OID 65476)
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- TOC entry 2746 (class 2606 OID 65479)
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- TOC entry 2735 (class 2606 OID 65444)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 2737 (class 2606 OID 65442)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 2738 (class 1259 OID 65451)
-- Name: password_resets_email_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);


--
-- TOC entry 2747 (class 1259 OID 65477)
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


--
-- TOC entry 2752 (class 2606 OID 65504)
-- Name: learn_activities learn_activities_method_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.learn_activities
    ADD CONSTRAINT learn_activities_method_id_foreign FOREIGN KEY (method_id) REFERENCES public.learn_activity_methods(id);


-- Completed on 2022-08-08 03:09:21

--
-- PostgreSQL database dump complete
--

