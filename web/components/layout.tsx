import Head from "next/head";
import { PropsWithChildren } from "react";
import Footer from "./footer";
import Navbar from "./navbar";
import styles from "../styles/Layout.module.css";

export default function Layout({ children }: PropsWithChildren) {
	return (
		<>
			<Head>
				<title>Wine E-Commerce</title>
				<meta name="description" content="E-commerce de vinho" />
				<meta name="viewport" content="width=device-width, initial-scale=1.0" />
			</Head>
			<Navbar />
			<main className={styles.main}>
				<div className={styles.container}>{children}</div>
			</main>
			<Footer />
		</>
	);
}
