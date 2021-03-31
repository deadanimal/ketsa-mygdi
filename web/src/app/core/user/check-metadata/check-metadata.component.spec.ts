import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CheckMetadataComponent } from './check-metadata.component';

describe('CheckMetadataComponent', () => {
  let component: CheckMetadataComponent;
  let fixture: ComponentFixture<CheckMetadataComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CheckMetadataComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CheckMetadataComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
