import Image from "next/image";
import styles from "../styles/Navbar.module.css";
import logo from "../public/logo.png";
import { FaShoppingCart } from "react-icons/fa";
import Link from "next/link";

export default function Navbar() {
	return (
		<nav className={styles.navbar}>
			<figure>
				<Link href="/">
					<Image src={logo} alt="Logotipo da loja" width={80} height={60} />
				</Link>
			</figure>

			<FaShoppingCart className={styles.cart} />
		</nav>
	);
}
