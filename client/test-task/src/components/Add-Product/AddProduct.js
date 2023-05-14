import { Link } from "react-router-dom";

export default function AddProduct(){
    return (
        <div>
        <div>
          <nav>
            <div className="nav-links">
               <Link className="nav-brand" to="/">Product Add</Link>
               <div className="nav-btns">
                    <Link to="/addproduct">
                        <button>Save</button>
                    </Link>
                    <Link to="/">
                        <button>Cancel</button>
                    </Link>
               </div>
            </div>
            
          </nav>
        </div>
    </div>
    )
}