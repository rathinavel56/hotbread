import {
    ChangeDetectionStrategy,
    Component,
    ElementRef,
    OnInit,
    ViewChild,
} from '@angular/core';
import { ReceipeService } from '../../services/receipe.service';
@Component({
    changeDetection: ChangeDetectionStrategy.OnPush,
    templateUrl: './ingredients.component.html',
    styleUrls: ['ingredients.component.scss'],
})
export class IngredientsComponent implements OnInit {
    isAdd: boolean = false;
    isEdit: boolean = false;
    isSearch: boolean = true;
    constructor(private receipeService: ReceipeService) {}
    ngOnInit() {
        this.getIngredients();
    }
    getIngredients() {
        this.receipeService.getIngredients()
        .subscribe(v => {
            console.log('v', v);
        });
    }
}
